// index.js
const fs = require('fs');
const { KnotHash } = require('./KnotHash');

let input = fs.readFileSync(process.argv.pop()).toString();
input = input.trim();
let size = parseInt(process.argv.pop(), 10);

const hash = new KnotHash(size, input);
console.log(hash.encrypt());
