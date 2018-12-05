const PartOne = require('./PartOne');
const PartTwo = require('./PartTwo');

test('Part One: How many units remain after fully reacting the polymer you scanned?', () => {
    expect(PartOne()).toEqual(10888);
});

test('Part Two: What is the length of the shortest polymer you can produce?', () => {
    expect(PartTwo()).toEqual(6952);
});
