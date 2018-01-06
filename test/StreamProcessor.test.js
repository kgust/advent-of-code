// StreamProcessor.test.js
const streamProcessor = require('../StreamProcessor');

test('must have at least one test', () => {
    expect(1).toBeTruthy();
});

// test('clean up garbage', () => {
//     expect(streamProcessor('<>')).toBe('');
//     expect(streamProcessor('<random characters>')).toBe('');
//     expect(streamProcessor('<<<<>')).toBe('');
//     expect(streamProcessor('<{!>}>')).toBe('');
//     expect(streamProcessor('<!!!>>')).toBe('');
//     expect(streamProcessor('<{o"i!a,<{i<a>')).toBe('');
//     expect(streamProcessor('{{<ab>},{<ab>},{<ab>},{<ab>}}')).toBe('{{},{},{},{}}');
//     expect(streamProcessor('{{<a!>},{<a!>},{<a!>},{<ab>}}')).toBe('{{}}');
// });

// {}, score of 1.
// {{{}}}, score of 1 + 2 + 3 = 6.
// {{},{}}, score of 1 + 2 + 2 = 5.
// {{{},{},{{}}}}, score of 1 + 2 + 3 + 3 + 3 + 4 = 16.
// {<a>,<a>,<a>,<a>}, score of 1.
// {{<ab>},{<ab>},{<ab>},{<ab>}}, score of 1 + 2 + 2 + 2 + 2 = 9.
// {{<!!>},{<!!>},{<!!>},{<!!>}}, score of 1 + 2 + 2 + 2 + 2 = 9.
// test('count groups', () => {
//     expect(streamProcessor('{}')).toBe(1);
//     expect(streamProcessor('{{{}}}')).toBe(6);
//     expect(streamProcessor('{{},{}}')).toBe(5);
//     expect(streamProcessor('{{{},{},{{}}}}')).toBe(16);
//     expect(streamProcessor('{<a>,<a>,<a>,<a>},')).toBe(1);
//     expect(streamProcessor('{{<ab>},{<ab>},{<ab>},{<ab>}}')).toBe(9);
//     expect(streamProcessor('{{<a!>},{<a!>},{<a!>},{<ab>}}')).toBe(3);
// });
