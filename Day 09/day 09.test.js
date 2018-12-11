const {CircularList} = require('@jasonheecs/js-data-structures');
const PartOne = require('./PartOne');
// const PartTwo = require('./PartTwo');
const max = numbers => Math.maxX.apply(null, numbers);

test('What is the highest score', () => {
    // expect(PartOne(9, 25).score()).toEqual(23+9); // 32
});

test('Test addMarble()', () => {
    const list = new CircularList();
    const partOne = new PartOne(9, 26);

    expect(partOne.addMarble(0, list).values).toEqual('0');
    expect(partOne.addMarble(1, list).values).toEqual('0,1');
    expect(partOne.addMarble(2, list).values).toEqual('0,2,1');
    expect(partOne.addMarble(3, list).values).toEqual('0,2,1,3');
    expect(partOne.addMarble(4, list).values).toEqual('0,4,2,1,3');
    expect(partOne.addMarble(5, list).values).toEqual('0,4,2,5,1,3');
    expect(partOne.addMarble(6, list).values).toEqual('0,4,2,5,1,6,3');
    for (let i=7; i<22; i++) {
        partOne.addMarble(i, list);
    }
    expect(partOne.addMarble(22, list).values).toEqual('0,16,8,17,4,18,9,19,2,20,10,21,5,22,11,1,12,6,13,3,14,7,15');
    expect(partOne.addMarble(23, list).values).toEqual('0,16,8,17,4,18,19,2,20,10,21,5,22,11,1,12,6,13,3,14,7,15');
});

test('Score for 9 players and 26 marbles', () => {
    const list = new CircularList();
    const partOne = new PartOne(9, 26);

    for (let marble=0; marble<26; marble++) {
        partOne.addMarble(marble, list);
    }
    expect(partOne.score['6']).toEqual(32);
});

test('Score for 10 players and 1619 marbles', () => {
    const list = new CircularList();
    const partOne = new PartOne(10, 1619);

    for (let marble=0; marble<1619; marble++) {
        partOne.addMarble(marble, list);
    }
    expect(max(Object.values(partOne.score))).toEqual(8317);
});

test('Score the rest of the values', () => {
    let partOne = new PartOne(0, 0);

    // 13 players; last marble is worth 7999 points: high score is 146373
    partOne = new PartOne(13, 8000);
    partOne.play();
    expect(max(Object.values(partOne.score))).toEqual(146373);

    // 17 players; last marble is worth 1104 points: high score is 2764
    partOne = new PartOne(17, 1105);
    partOne.play();
    expect(max(Object.values(partOne.score))).toEqual(2764);

    // 21 players; last marble is worth 6111 points: high score is 54718
    partOne = new PartOne(21, 6112);
    partOne.play();
    expect(max(Object.values(partOne.score))).toEqual(54718);

    // 30 players; last marble is worth 5807 points: high score is 37305
    partOne = new PartOne(30, 5808);
    partOne.play();
    expect(max(Object.values(partOne.score))).toEqual(37305);
});

test('What is the winning elf\'s score?', () => {
    // 428 players; last marble is worth 70825 points
    partOne = new PartOne(428, 70826);
    partOne.play();
    expect(max(Object.values(partOne.score))).toEqual(398502);
});

test('What is the winning elf\'s score with 100x marbles?', () => {
    // 428 players; last marble is worth 7082500 points
    partOne = new PartOne(428, 7082501);
    partOne.play();
    expect(max(Object.values(partOne.score))).toEqual(398592);
});