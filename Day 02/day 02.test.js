const Count = require('./Count');
const Part1 = require('./Part1');
const Part2 = require('./Part2');

describe('Part 1 works correctly', () => {
    test('correctly parse sample input', () => {
        expect(new Count('abcdef').count).toEqual([false, false]);
        expect(new Count('bababc').count).toEqual([true, true]);
        expect(new Count('abbcde').count).toEqual([true, false]);
        expect(new Count('abcccd').count).toEqual([false, true]);
        expect(new Count('aabcdd').count).toEqual([true, false]);
        expect(new Count('abcdee').count).toEqual([true, false]);
        expect(new Count('ababab').count).toEqual([false, true]);
    });

    test('Calculate checksum of list of ids', () => {
        expect(Part1).toEqual(5478);
    });
});

