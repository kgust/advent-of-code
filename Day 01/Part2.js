const Parse = require('./Parse');
const input = new Parse('./Day 01/input').input;

let frequency = 0;
let firstRepeat = 0;
let frequencies = [];

while (firstRepeat === 0) {
    for (const adjustment of input) {
        frequency += adjustment;

        if (firstRepeat === 0 && frequencies.includes(frequency)) {
            firstRepeat = frequency;
            break;
        }

        frequencies.push(frequency);
    }
}

module.exports = frequency;
