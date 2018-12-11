const Parser = require('./Parser');
const PartOne = require('./PartOne');

const data = new Parser('./input.txt');
console.log(new PartOne(data).after(Number(process.argv[2])));