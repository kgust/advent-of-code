const fs = require('fs');

class Parser {
    constructor(path) {
        this.input = fs.readFileSync(path).toString().trim("\n").split("\n");

        return this.input.map(line => {
            // position=< 9,  1> velocity=< 0,  2>
            // position=<-19942, -39989> velocity=< 2,  4>
            return line
                .replace(/[^\-\s\d]+/g, [])
                .trim()
                .split(' ')
                .filter(element => element)
                .map(element => Number(element));
        });

    }
}

module.exports = Parser;
