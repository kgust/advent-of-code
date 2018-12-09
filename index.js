// index.js
// Your puzzle input is hfdlxzhv.

// const fs = require('fs');
// const input = fs.readFileSync(process.argv.pop()).toString();
// const input = 'hfdlxzhv'; //fs.readFileSync(process.argv.pop()).toString();
const DuelingGenerators = require('./DuelingGenerator');
const generator = new DuelingGenerators(65, 16807, 8921, 48271);

console.log(
    generator.genA.next().value,
    generator.genA.next().value
);
