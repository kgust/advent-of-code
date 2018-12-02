const fs = require('fs');

class Parse {
    constructor(path) {
        console.log(path);
        this.input = fs.readFileSync(path).toString().split("\n");
    }

    set input(input) {
        this._input = input;
    }

    get input() {
        return this._input.map(function(value) {
            return Number(value);
        });
    }
}

module.exports = Parse;

