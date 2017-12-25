// spreadsheet.test.js
const checksum = require('../spreadsheetChecksum');

test('expect input to equal 4', () => {
    expect(checksum([5,9,2,8].join("\t"))).toBe(4);
});

test('expect input to equal 4', () => {
    expect(checksum([9,4,7,3].join("\t"))).toBe(3);
});

test('expect input to equal 4', () => {
    expect(checksum([3,8,6,5].join("\t"))).toBe(2);
});

test('expect input to equal 9', () => {
    expect(checksum(
        [
            [5,9,2,8].join("\t"),
            [9,4,7,3].join("\t"),
            [3,8,6,5].join("\t")
        ].join("\n")
    )).toBe(9);
});
