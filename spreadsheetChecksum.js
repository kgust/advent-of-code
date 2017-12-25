// spreadsheetChecksum.js

function checksum(input) {
    let lines = input.split("\n");
    let sum = 0;

    lines.forEach(line => {
        if (line.length < 3) return true;
        let values = line.split("\t").map(Number);

        // TODO find the values that multiples
        // e.g. 8 / 2 = 4
        for (let i=0; i<values.length; i++) {
            for (let j=0; j<values.length; j++) {
                if (values[i] === values[j]) continue;
                if (values[i] % values[j] === 0) {
                    sum += (values[i]/values[j]);
                }
            }
        }
    });

    return sum;
}

module.exports = checksum;
