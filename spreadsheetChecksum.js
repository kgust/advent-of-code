// spreadsheetChecksum.js

function checksum(input) {
    let lines = input.split("\n");
    let sum = 0;

    lines.forEach(line => {
        if (line.length < 3) return true;
        let values = line.split("\t").map(Number);
        let max = Math.max.apply(Math, values);
        let min = Math.min.apply(Math, values);
        sum += max - min;
    });

    return sum;
}

module.exports = checksum;
