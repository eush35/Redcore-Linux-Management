const WebSocket = require('ws');
const { exec } = require('child_process');

// Create a WebSocket server
const wss = new WebSocket.Server({ port: 8083 });

// WebSocket connection listener
wss.on('connection', ws => {
  // Send process list to the connected client
  sendProcessList(ws);

  // Update process list every second
  const interval = setInterval(() => {
    sendProcessList(ws);
  }, 1000);

  // WebSocket close event listener
  ws.on('close', () => {
    clearInterval(interval);
  });
});

// Function to send the process list to the WebSocket client
function sendProcessList(ws) {
  getProcessList(processes => {
    ws.send(JSON.stringify(processes));
  });
}

// Function to retrieve the process list
function getProcessList(callback) {
  const processList = [];

  // Execute the 'top' command to retrieve the process information
  exec('top -b -n 1 -o %CPU', (error, stdout) => {
    if (error) {
      console.error(`Error executing top command: ${error.message}`);
      callback(processList); // Return empty process list on error
      return;
    }

    const lines = stdout.split('\n');

    // Parse the output and collect relevant information
    for (let i = 7; i < lines.length; i++) {
      const line = lines[i].trim();
      const columns = line.split(/\s+/);

      const processItem = {
        PID: parseInt(columns[0]),
        USER: columns[1],
        '%CPU': parseFloat(columns[8]),
        '%MEM': parseFloat(columns[9]),
        COMMAND: columns.slice(11).join(' '),
      };

      processList.push(processItem);
    }

    callback(processList); // Return the populated process list
  });
}
