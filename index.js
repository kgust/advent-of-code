// index.js
const fs = require('fs');
const HexEd = require('./HexEd');

let input = fs.readFileSync(process.argv.pop()).toString();
input = input.trim();

const grid = new HexEd(input);
console.log(grid.furthest);
