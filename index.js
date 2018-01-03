// index.js
const fs = require('fs');
const reallocate = require('./MemoryReallocation');
let input = fs.readFileSync('/dev/stdin').toString();
let results;

input = input.split("\t").map(val => {
    return parseInt(val, 10);
});

console.log('distribution cycles:', reallocate(input));
