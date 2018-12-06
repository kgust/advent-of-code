const PartOne = require('./PartOne');
const PartTwo = require('./PartTwo');

test("Part One: What is the size of the largest area that isn't infinite", () => {
    expect(PartOne('./Day 06/input.txt')).toEqual(4016);
});

test('Part Two: What is the size of the region containing all locations which have a total distance to all given coordinates of less than 10000', () => {
    expect(PartTwo('./Day 06/input.txt')).toEqual(46306);
});
