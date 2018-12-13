const fs = require('fs');

class Parser {
    constructor(path) {
        this.input = fs.readFileSync(path).toString().trim("\n").split("\n");

        this.initialState = this.input.shift().split(' ')[2];
        this.input.shift(); // blank line

        // .##.. => #
        // #...# => .
        this.notes = this.input.map(line => line.split(' => '));
    }
}

module.exports = Parser;
