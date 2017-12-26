// index.js
const fs = require('fs');
const jumpList = require('./jumplist');
let input = fs.readFileSync('/dev/stdin').toString();
let results;

// input = "0\n3\n0\n1\n-3";
input = input.split("\n").map(val => {
    return parseInt(val, 10);
});

// remove trailing empty element (if necessary)
const last = input.pop();
if (Number.isNaN(last) !== true) input.push(last);

while(true) {
    results = jumpList(input).next();
    if (results.value >= input.length) break;
}
console.log(results);
