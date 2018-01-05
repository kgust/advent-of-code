// index.js
const fs = require('fs');
const findUnbalanced = require('./RecursiveCircus');

let input = fs.readFileSync(process.argv.pop()).toString();
input = input.split("\n");

console.log(findUnbalanced(input));
