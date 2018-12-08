const Parser = require('./Parser');
const PartOne = require('./PartOne');
const PartTwo = require('./PartTwo');

test('Parser should return objects', () => {
    const data = new Parser('./Day 07/sample.txt').data();
    // console.log(data);
    expect(data.C).toEqual({id: 'C', belongsTo: {}});
    expect(data.A).toEqual({id: 'A', belongsTo: { C: true }});
    expect(data.E).toEqual({id: 'E', belongsTo: { B: true, D: true, F: true }});
});

test('Part One: Sample data correct order should be "CABDFE"', () => {
    const data = new Parser('./Day 07/sample.txt').data();
    expect(PartOne(data)).toEqual('CABDFE');
});

test('Part One: Input data correct order should be "…"', () => {
    const data = new Parser('./Day 07/input.txt').data();
    expect(PartOne(data)).toEqual('HEGMPOAWBFCDITVXYZRKUQNSLJ');
});

test('Part Two: Sample data...', () => {
    const data = new Parser('./Day 07/sample.txt').lines ;
    expect(PartTwo(data, 2)).toEqual(258);
});
test('Part Two: Input data...', () => {
    const data = new Parser('./Day 07/input.txt').lines ;
    expect(PartTwo(data, 5)).toEqual(1226);
});
