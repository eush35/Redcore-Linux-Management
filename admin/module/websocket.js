const WebSocket = require('ws');
const pty = require('node-pty');

const wss = new WebSocket.Server({ port: 8080 });
wss.on('connection', function connection(ws) {
  console.log('Bir istemci bağlandı.');

  const term = pty.spawn('bash', [], {
    name: 'xterm-color',
    cols: 80,
    rows: 24,
    cwd: process.env.HOME,
    env: process.env
  });

  term.on('data', function(data) {
    ws.send(data);
  });

  ws.on('message', function incoming(message) {
    term.write(message);
  });

  ws.on('close', function close() {
    term.kill();
    console.log('Bağlantı Kapatıldı.');
  });
});