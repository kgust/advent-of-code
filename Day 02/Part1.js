const Count = require('./Count');
const Parse = require('./Parse');
const boxes = new Parse('./Day 02/input.txt');
let TwoCount = 0;
let ThreeCount = 0;

for (const box of boxes.input) {
    let result = new Count(box).count;
    if (result[0]) {
        ++TwoCount;
    }
    if (result[1]) {
        ++ThreeCount;
    }
}

module.exports = TwoCount * ThreeCount;
