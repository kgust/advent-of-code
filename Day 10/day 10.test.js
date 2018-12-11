const Parser = require('./Parser');
const PartOne = require('./PartOne');
// const PartTwo = require('./PartTwo');

test('For sample.txt, parser produces...', () => {
    const parser = new Parser('./Day 10/sample.txt');
    expect(parser.shift()).toEqual([9,1,0,2]);
    expect(parser.shift()).toEqual([7,0,-1,0]);
    expect(parser.shift()).toEqual([3,-2,-1,1]);
    expect(parser.shift()).toEqual([6,10,-2,-1]);
    expect(parser.shift()).toEqual([2,-4,2,2]);
    expect(parser.shift()).toEqual([-6,10,2,-2]);
    expect(parser.shift()).toEqual([1,8,1,-1]);
    expect(parser.shift()).toEqual([1,7,1,0]);
    expect(parser.shift()).toEqual([-3,11,1,-2]);
    expect(parser.shift()).toEqual([7,6,-1,-1]);
    expect(parser.shift()).toEqual([-2,3,1,0]);
    expect(parser.shift()).toEqual([-4,3,2,0]);
    expect(parser.shift()).toEqual([10,-3,-1,1]);
    // "10,3,1,1 5,11,1,2        4,7,0,1 8,2,0,1 15,0,2,0        1,6,1,0 8,9,0,1 3,3,1,1 0,5,0,1 2,2,2,0 5,2,1,2 1,4,2,1 2,7,2,2 3,6,1,15,0,1,0  6,0,2,0 5,9,1,2 14,7,2,0        3,6,2,1"
});

test('Initial result with sample.txt', () => {
    const sample = new Parser('./Day 10/sample.txt');
    expect(new PartOne(sample).after(0)).toEqual([
        '        #             ',
        '                #     ',
        '         # #  #       ',
        '                      ',
        '#          # #       #',
        '               #      ',
        '    #                 ',
        '  # #    #            ',
        '       #              ',
        '      #               ',
        '   #   # #   #        ',
        '    #  #  #         # ',
        '       #              ',
        '           #  #       ',
        '#           #         ',
        '   #       #          '
    ].join("\n"));
});

test('After three seconds with sample.txt', () => {
    const sample = new Parser('./Day 10/sample.txt');
    expect(new PartOne(sample).after(3)).toEqual([
        '#   #  ###',
        '#   #   # ',
        '#   #   # ',
        '#####   # ',
        '#   #   # ',
        '#   #   # ',
        '#   #   # ',
        '#   #  ###'
    ].join("\n"))
});
