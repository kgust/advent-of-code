// index.js
const fs = require('fs');
const DigitalPlumber = require('./DigitalPlumber');

let input = fs.readFileSync(process.argv.pop()).toString();
input = input.trim();

// const plumber = new DigitalPlumber(input);
// console.log(plumber.countProgramsInGroup(0));

const plumber = new DigitalPlumber(input);
console.log(plumber.countGroups());
