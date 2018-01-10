// HexEd.test.js
const HexEd = require('../HexEd');

test('must have at least one test', () => {
    expect(1).toBeTruthy();
});

test('[ne,ne,ne] is three steps', () => {
    const grid = new HexEd('ne,ne,ne');
    expect(grid.steps()).toBe(3);
});

test('[ne,ne,sw,sw] is zero steps', () => {
    const grid = new HexEd('ne,ne,sw,sw');
    expect(grid.position()).toEqual({x: 0, y: 0});
    expect(grid.steps()).toBe(0);
});

test('[ne,ne,s,s] is two steps', () => {
    const grid = new HexEd('ne,ne,s,s');
    expect(grid.steps()).toBe(2);
});

test('[se,sw,se,sw,sw] is three steps', () => {
    const grid = new HexEd('se,sw,se,sw,sw');
    expect(grid.steps()).toBe(3);
});

test('[n,n,n,n] is four steps', () => {
    const grid = new HexEd('n,n,n,n');
    expect(grid.steps()).toBe(4);
});

test('[nw,nw,nw,se,se] is one step', () => {
    const grid = new HexEd('nw,se,nw,se,nw');
    expect(grid.position()).toEqual({x: -1, y: 0});
    expect(grid.steps()).toBe(1);
});
