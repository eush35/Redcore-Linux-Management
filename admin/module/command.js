const WebSocket = require('ws');
const { exec } = require('child_process');
const os = require('os');

const wss = new WebSocket.Server({ port: 8081 });

//cpuPercentUsage
setInterval(() => {
    wss.clients.forEach((client) => {
      exec("top -b -n 1 | awk '/^%Cpu/{print $2+$4}'", (error, stdout, stderr) => {
        if (error) {
          console.error(`Komut çalıştırılırken bir hata oluştu: ${error}`);
          client.send(`Hata: ${error.message}`);
          return;
        }
        const cpuUsage = parseFloat(stdout.trim());

        //
        exec("free -m | awk '/^Mem:/{print $3/$2 * 100.0}'", (error, stdout, stderr) => {
          if (error) {
            console.error(`Komut çalıştırılırken bir hata oluştu: ${error}`);
            client.send(`Hata: ${error.message}`);
            return;
          }
          const ramUsage = parseFloat(stdout.trim());

            //
            exec("iostat -d sda | awk '/sda/ {print \"{\\\"kB_read\\\": \"$3\", \\\"kB_wrtn\\\": \"$4\"}\"}'", (error, stdout, stderr) => {

              if (error) {
                console.error(`Komut çalıştırılırken bir hata oluştu: ${error}`);
                client.send(`Hata: ${error.message}`);
                return;
              }
              
              const diskStats = JSON.parse(stdout.trim());

              const diskOkuma = diskStats.kB_read;
              const diskYazma = diskStats.kB_wrtn;
              

            const usageData = { cpuUsage, ramUsage, diskStats, diskOkuma, diskYazma,};
            client.send(JSON.stringify(usageData));
                });
              });
            });
          });
  }, 5000);

 wss.on('connection', (ws) => {
    console.log('Bir istemci bağlandı');
  });




