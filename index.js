// index.js
const fs = require('fs');
const checksum = require('./spreadsheetChecksum.js');

console.log(
    checksum(
        fs.readFileSync('/dev/stdin').toString()
    )
);
