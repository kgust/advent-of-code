// spiralMemory.test.js

const calculate = require('../spiralMemory');

test('expect input to equal output', () => {
    const provider = [
        [1,0],
        [12, 3],
        [23, 2],
        [1024, 31],
        [312051, 430]

    ];

    provider.forEach(values => {
        let [input, output] = values;
        expect(calculate(input)).toBe(output);
    });
});
