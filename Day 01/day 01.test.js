const Parse = require('./Parse');
const Part1 = require('./Part1');
const Part2 = require('./Part2');

test('correctly parse sample input', () => {
    expect(new Parse('./Day 01/sample').input).toEqual([1, -2, 3, 1]);
});

test('The sample input should equal three', () => {
    const input = new Parse('./Day 01/sample').input;
    let value = 0;
    input.forEach(line => {
        value += line;
    });
    expect(value).toBe(3);
});

test('Part 1 returns 377', () => {
    expect(Part1).toEqual(477);
});

test('Part 2 returns 390', () => {
    expect(Part2).toEqual(390);
});
