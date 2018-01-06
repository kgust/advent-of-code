// index.js
const fs = require('fs');
const processStream = require('./StreamProcessor');

let input = fs.readFileSync(process.argv.pop()).toString();

console.log(processStream(input));
