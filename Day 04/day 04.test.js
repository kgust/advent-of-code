const Parser = require('./Parser');
const PartOne = require('./PartOne');
const PartTwo = require('./PartTwo');

test('Parser imports sample values', () => {
    const sample = new Parser('./Day 04/sample.txt');
    expect(sample.get("10").size).toEqual(49);
});

test('Parser imports sorted input values', () => {
    const input = new Parser('./Day 04/input_sorted.txt');
    expect(input.get("2161").size).toEqual(59);
});

test('Part One returns the correct value', () => {
    expect(PartOne('./Day 04/sample.txt')).toEqual(240);
    expect(PartOne('./Day 04/input_sorted.txt')).toEqual(84834);
});

test('Part Two returns the correct value', () => {
    expect(PartTwo('./Day 04/sample.txt')).toEqual(4455);
    expect(PartTwo('./Day 04/input_sorted.txt')).toEqual(53427);
});
