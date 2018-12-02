const Parse = require('./Parse');
const input = new Parse('./Day 01/input').input;

let frequency = 0;

input.forEach(adjustment => {
    frequency += adjustment;
});

module.exports = frequency;
