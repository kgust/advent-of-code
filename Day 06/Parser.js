const fs = require('fs');

class Parser {
    constructor(path) {
        const lines = fs.readFileSync(path).toString().trim("\n").split("\n");
        this.input = lines.map(line => {
            return line.split(', ');
        });
    }
}

module.exports = Parser;
