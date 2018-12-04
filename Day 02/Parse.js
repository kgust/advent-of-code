const fs = require('fs');

class Parse {
    constructor(path) {
        this.input = fs.readFileSync(path).toString().split("\n");
    }
}

module.exports = Parse;
