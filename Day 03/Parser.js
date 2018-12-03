const fs = require('fs');

class Parser {
    constructor() {

    }

    parse(path) {
        return fs.readFileSync(path).toString().trim("\n").split("\n").map(line => {
            let matches = /^#(\d+) @ (\d+),(\d+): (\d+)x(\d+)$/.exec(line);
            return {
                id: matches[1],
                position: { x: Number(matches[2]), y: Number(matches[3]) },
                size: { width: Number(matches[4]), height: Number(matches[5]) }
            };
        });
    }
}

module.exports = Parser;
