// index.js
const fs = require('fs');
const input = fs.readFileSync(process.argv.pop()).toString();
const PacketScanner = require('./PacketScanner');
const firewall = new PacketScanner(input);

console.log(firewall.calculateTripSeverity());
