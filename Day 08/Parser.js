const fs = require('fs');

class Parser {
    constructor(path) {
        this.data = fs.readFileSync(path).toString().trim("\n").split(" ");
        this.input = this.parse(this.data);
        this.metadataSum = 0;
    }

    parse(data) {
        const header = {
            children: Number(data.shift()),
            metadata: Number(data.shift())
        };
        const children = [];
        const metadata = [];

        for (let i = 0; i < header.children; i++) {
            children.push(this.parse(data));
        }

        for (let i = 0; i < header.metadata; i++) {
            metadata.push(Number(data.shift()));
        }

        return {
            children: children,
            metadata: metadata
        };
    }
}

module.exports = Parser;
