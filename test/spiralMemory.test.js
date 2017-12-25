// spiralMemory.test.js

// Square 1 starts with the value 1.
// Square 2 has only one adjacent filled square (with value 1), so it also stores 1.
// Square 3 has both of the above squares as neighbors and stores the sum of their values, 2.
// Square 4 has all three of the aforementioned squares as neighbors and stores the sum of their values, 4.
// Square 5 only has the first and fourth squares as neighbors, so it gets the value 5.


const calculate = require('../spiralMemory');

test('expect input to equal output', () => {
    const provider = [
        // [1, 1],
        // [2, 1],
        // [3, 2],
        // [4, 4],
        // [5, 5]
    ];

    provider.forEach(values => {
        let [input, output] = values;
        expect(calculate(input)).toBe(output);
    });
});
