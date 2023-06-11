const WebSocket = require('ws');
const { exec } = require('child_process');

const wss = new WebSocket.Server({ port: 8082 });

wss.on('connection', function connection(ws) {
  console.log('Servis bağlantısı kuruldu.');

  ws.on('message', function incoming(message) {
    console.log('Alınan mesaj:', message);

    if (message === 'stop-apache') {
      exec('systemctl stop apache2', (error, stdout, stderr) => {
        if (error) {
          console.error(`exec error: ${error}`);
          ws.send(`Hata: ${error.message}`);
          return;
        }
        console.log(`stdout: ${stdout}`);
        ws.send(`Çıktı: ${stdout}`);
      });
    } else if (message === 'start-apache') {
      exec('systemctl start apache2', (error, stdout, stderr) => {
        if (error) {
          console.error(`exec error: ${error}`);
          ws.send(`Hata: ${error.message}`);
          return;
        }
        console.log(`stdout: ${stdout}`);
        ws.send(`Çıktı: ${stdout}`);
      });
    } else {
      console.log('Bilinmeyen komut:', message);
      ws.send('Bilinmeyen komut.');
    }
  });
});