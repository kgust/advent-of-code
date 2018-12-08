const fs = require('fs');

class Parser {
    constructor(path) {
        this.lines = fs.readFileSync(path).toString().trim('\n').split("\n");
    }

    data() {
        let data = {};
        this.lines.forEach(line => {
            const id = line.split(' ')[1];
            const child = line.split(' ')[7];
            data[id] = data[id] || {id: id, belongsTo: {}};
            data[child] = data[child] || {id: child, belongsTo: {}};
            data[child].belongsTo[id] = true
        });
        return data;
    }
}

module.exports = Parser;
