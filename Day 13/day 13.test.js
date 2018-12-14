const Parser = require('./Parser');
const PartOne = require('./PartOne');
const Cart = require('./Cart');

test('correctly parses carts', () => {
    const parser = new Parser('./Day 13/sample.txt');
    expect(parser.carts.length).toBe(2);
    expect(parser.carts[0].position).toEqual([2, 0]);
    expect(parser.carts[0].direction).toEqual([1, 0]);
    expect(parser.carts[1].position).toEqual([9, 3]);
    expect(parser.carts[1].direction).toEqual([0, 1]);
});

test('correctly parses tracks', () => {
    const parser = new Parser('./Day 13/sample.txt');
    const partOne = new PartOne(parser);

    // console.log(parser.tracks.join("\n"));
    // console.log(partOne.displayTracks());
    expect(parser.tracks.length).toBe(6);
    expect(parser.tracks[0].length).toBe(13);
    // expect(partOne.displayTracks()).toBe('');
});

test.each([
    [0, 0, [2,0], [1,0]],
    [0, 1, [3,0], [1,0]],
    [0, 2, [4,0], [0,1]],
    [0, 3, [4,1], [0,1]],
    [0, 4, [4,2], [1,0]], // 0, '\\', [4,2]
    [0, 5, [5,2], [1,0]],
    [0, 6, [6,2], [1,0]],
    [0, 7, [7,2], [1,0]],
    [1, 0, [9,3], [0,1]],
    [1, 1, [9,4], [1,0]],  // 0, '\\', [9,4] => [0,1]
    [1, 2, [10,4], [1,0]],
    [1, 3, [11,4], [1,0]],
    [1, 4, [12,4], [0,-1]],
    [1, 5, [12,3], [0,-1]],
    [1, 6, [12,2], [0,-1]],
    [1, 7, [12,1], [-1,0]],
])(`Cart %i after %i moves...`, (cart, moves, position, direction) => {
    const parser = new Parser('./Day 13/sample.txt');
    const partOne = new PartOne(parser);
    partOne.move(moves);
    expect(parser.carts[cart].position).toEqual(position);
    expect(parser.carts[cart].direction).toEqual(direction);
});

test('What is the location of the first crash with sample data?', () => {
    const sample = new Parser('./Day 13/sample.txt');
    const partOne = new PartOne(sample);
    partOne.solve();

    expect(partOne.crashes.length).toBeGreaterThan(0);
    expect(partOne.crashes[0]).toEqual([7, 3]);
});

test('What is the location of the first crash with input data?', () => {
    const input = new Parser('./Day 13/input.txt');
    const partOne = new PartOne(input);
    partOne.solve();

    expect(partOne.crashes.length).toBeGreaterThan(0);
    expect(partOne.crashes[0]).toEqual([113, 136]);
});

test('What is the location of the last crash with sample data?', () => {
    const input = new Parser('./Day 13/input.txt');
    const partOne = new PartOne(input);
    partOne.solve();

    expect(partOne.crashes.length).toBeGreaterThan(0);
    expect(partOne.crashes.pop()).toEqual([114, 136]);
});

// crash: 113,136
// crash: 27,32
// crash: 86,130
// crash: 67,59
// crash: 63,23
// crash: 97,79
// crash: 77,112
// crash: 59,97
// last: 114,136

// test('What is the location of the last cart at the end of the first tick where it is the only cart left?', () => {
//     const input = new Parser('./Day 13/sample.txt').input;
//     const partTwo = new PartTwo(input);
//
//     expect(partTwo.solve()).toEqual([114,136]);
// });

test('next turn', () => {
    const cart = new Cart([1,1], [1,0]);
    expect(cart.nextTurn()).toBe(0);
    expect(cart.nextTurn()).toBe(1);
    expect(cart.nextTurn()).toBe(2);
    expect(cart.nextTurn()).toBe(0);
});

test('compare function', () => {
    const parser = new Parser('./Day 13/sample.txt');
    const partOne = new PartOne(parser);
    expect([ [1,0], [2,0] ].sort(partOne.compare)).toEqual([ [1,0], [2,0] ]);
    expect([ [2,0], [1,0] ].sort(partOne.compare)).toEqual([ [1,0], [2,0] ]);
    expect([ [2,0], [1,1] ].sort(partOne.compare)).toEqual([ [2,0], [1,1] ]);
    expect([ [0,1], [0,2] ].sort(partOne.compare)).toEqual([ [0,1], [0,2] ]);
});

test('test change direction', () => {
    const partOne = new PartOne({cart: [], tracks: []});
    const cart = new Cart([0,0], [1,0]);
    expect(partOne.changeDirection(cart, '\\').direction).toEqual([0,1]);
    cart.direction = [1,0];
    expect(partOne.changeDirection(cart, '/').direction).toEqual([0,-1]);
    cart.direction = [-1,0];
    expect(partOne.changeDirection(cart, '\\').direction).toEqual([0,-1]);
    cart.direction = [-1,0];
    expect(partOne.changeDirection(cart, '/').direction).toEqual([0,1]);
    cart.direction = [0,1];
    expect(partOne.changeDirection(cart, '\\').direction).toEqual([1,0]);
    cart.direction = [0,1];
    expect(partOne.changeDirection(cart, '/').direction).toEqual([-1,0]);
    cart.direction = [0,-1];
    expect(partOne.changeDirection(cart, '\\').direction).toEqual([-1,0]);
    cart.direction = [0,-1];
    expect(partOne.changeDirection(cart, '/').direction).toEqual([1,0]);
});