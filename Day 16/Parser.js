/**
 * Parser.js
 */
const fs = require('fs');

class Parser {
    constructor(path) {
        this.input = fs.readFileSync(path).toString().trim("\n").split("\n");
        this.data = [];
        const inputLength = this.input.length / 4;
        for (let line = 0; line < inputLength; line++) {
            let before = new RegExp(/(\d+), (\d+), (\d+), (\d+)/).exec(this.input.shift());
            let input = new RegExp(/(\d+) (\d+) (\d+) (\d+)/).exec(this.input.shift());
            let after = new RegExp(/(\d+), (\d+), (\d+), (\d+)/).exec(this.input.shift());
            this.input.shift(); // blank line
            this.data.push({
                before: before ? before.slice(1, 5).map(value => Number(value)) : null,
                input: input ? input.slice(1, 5).map(value => Number(value)) : null,
                after: after ? after.slice(1, 5).map(value => Number(value)) : null,
            });
        }
    }
}

module.exports = Parser;
