// index.js
// Your puzzle input is hfdlxzhv.

// const fs = require('fs');
// const input = fs.readFileSync(process.argv.pop()).toString();
const input = 'hfdlxzhv'; //fs.readFileSync(process.argv.pop()).toString();
const DiskDefragmentation = require('./DiskDefragmentation');

const defragger = new DiskDefragmentation(input);
console.log(
    defragger.defrag()
);
