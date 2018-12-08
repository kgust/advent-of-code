const Parser = require('./Parser');
const PartOne = require('./PartOne');
const PartTwo = require('./PartTwo');

test('Parsing the sample data should produce...', () => {
    expect(new Parser('./Day 08/sample.txt').input).toEqual(
        {
            children: [
                { children: [], metadata: [10, 11, 12] },
                {
                    children: [
                        { children: [], metadata: [99] }
                    ],
                    metadata: [2]
                }
            ],
            metadata: [1, 1, 2]
        }
    );
});

test('What is the sum of all sample metadata entries', () => {
    const data = new Parser('./Day 08/sample.txt').input;
    expect(new PartOne().sum(data)).toEqual(138);
});

test('What is the sum of all input metadata entries', () => {
    const data = new Parser('./Day 08/input.txt').input;
    expect(new PartOne().sum(data)).toEqual(40701);
});

test('What is the value of the sample root node', () => {
    const data = new Parser('./Day 08/sample.txt').input;
    expect(new PartTwo().value(data)).toEqual(66)
});

test('What is the value of the input root node', () => {
    const data = new Parser('./Day 08/input.txt').input;
    expect(new PartTwo().value(data)).toEqual(21399)
});
