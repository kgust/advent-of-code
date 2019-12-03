const Parser = require('./Parser');
const Processor = require('./Processor');
const ChronalClassification = require('./ChronalClassification');
const compare = (a, b) => a[0] === b[0] && a[1] === b[1] && a[2] === b[2] && a[3] === b[3];
const data = new Parser('./Day 16/hint.txt').data;

test('with sample input', () => {
    const processor = new Processor();
    expect(processor.opcodes.addi([3,2,1,1], [9,2,1,2]).registers).toEqual([3,2,2,1]);
    expect(processor.opcodes.mulr([3,2,1,1], [9,2,1,2]).registers).toEqual([3,2,2,1]);
    expect(processor.opcodes.seti([3,2,1,1], [9,2,1,2]).registers).toEqual([3,2,2,1]);

    let results = Object.values(processor.opcodes)
        .map(func => func([3,2,1,1], [9,2,1,2]).registers);
    expect(results.length).toBe(16);
    results = results.filter(result => compare(result, [3,2,2,1]));
    expect(results.length).toEqual(3);
});

test('loading input', () => {
    const input = new Parser('./Day 16/hint.txt').data;
    expect(input.shift()).toEqual({
        before: [1,1,2,0],
        input: [8,1,0,3],
        after: [1,1,2,1]
    });
    expect(input.shift()).toEqual({
        before: [1,1,1,2],
        input: [8,1,0,3],
        after: [1,1,1,1]
    });
});

test('count possible with sample input', () => {
    const classification =  new ChronalClassification(data);
    expect(classification.countPossible([3,2,1,1], [9,2,1,2], [3,2,2,1]).length).toEqual(3);
    expect(classification.countPossible([1,1,2,0], [8,1,0,3], [1,1,2,1]).length).toEqual(10);
});

test('count the possibles', () => {
    const results = new ChronalClassification(data).results;
    const filtered = results.filter(result => result.length > 2);
    filtered.forEach(result => console.log(result));
    // console.log(results);
    expect(results.length).toEqual(809);
    expect(filtered.length).toBe(614);
});

// 0 -> 13
// 1 ->  6
// 2 ->  0
// 3 -> 11
// 4 ->  3
// 5 -> 10
// 6 ->  2
// 7 ->  4
// 8 ->  7
// 9 -> 14
// 10 -> 15
// 11 ->  5
// 12 ->  8
// 13 -> 12
// 14 ->  1
// 15 ->  9
test('identify all opcodes', () => {
    const results = new ChronalClassification(data).results;
    const filtered = results.filter(result => result.length === 1);
    filtered.forEach(result => console.log(result/*result[0].input[0], result[0].opcode*/));
    expect(filtered.length).toBe(48);
});
