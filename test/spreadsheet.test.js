// spreadsheet.test.js
const checksum = require('../spreadsheetChecksum');

test('expect input to equal 18', () => {
    expect(checksum(
        [
            [5,1,9,5].join("\t"),
            [7,5,3].join("\t"),
            [2,4,6,8].join("\t")
        ].join("\n")
    )).toBe(18);
});
