const Parser = require('./Parser');
const Part1 = require('./PartOne');
const Part2 = require('./PartTwo');

test('Parser imports sample values', () => {
    const values = (new Parser).parse('./Day 03/sample.txt');
    // #1 @ 1,3: 4x4
    expect(values[0]).toEqual({"id": "1", "position": {"x": 1, "y": 3}, "size": {"height": 4, "width": 4}});
    // #2 @ 3,1: 4x4
    expect(values[1]).toEqual({"id": "2", "position": {"x": 3, "y": 1}, "size": {"height": 4, "width": 4}});
    // #3 @ 5,5: 2x2
    expect(values[2]).toEqual({"id": "3", "position": {"x": 5, "y": 5}, "size": {"height": 2, "width": 2}});
});

test('Day 3 counts overlapping tiles for sample input', () => {
    expect(Part1('./Day 03/sample.txt')).toEqual(4);
});

test('Day 3 counts overlapping tiles for input', () => {
    expect(Part1('./Day 03/input.txt')).toEqual(118322);
});

test('Day 3: no overlaps', () => {
    expect(Part2('./Day 03/input.txt')).toEqual('1178');
});