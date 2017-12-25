// index.js
const fs = require('fs');
const validate = require('./passphraseFileValidator');
const input = fs.readFileSync('/dev/stdin').toString();

console.log(
    validate(input)
);
