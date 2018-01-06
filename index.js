// index.js
const fs = require('fs');
const processInstructions = require('./Processor');

let input = fs.readFileSync(process.argv.pop()).toString();
input = input.split("\n");

console.log(processInstructions(input));
