// index.js
const fs = require('fs');
const calculate = require('./spiralMemory');
const input = fs.readFileSync('/dev/stdin').toString();

console.log(
    calculate(input)
);
