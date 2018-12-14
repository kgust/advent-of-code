const fs = require('fs');
const Cart = require('./Cart');

class Parser {
    constructor(path) {
        this.carts = [];
        this.tracks = {};
        this.input = fs.readFileSync(path).toString().trim("\n").split("\n");
        this.tracks = this.input.map((line, y) => {
            return line.split('').map((value, x) => {
                let position = [x, y];
                let direction = [0, 0];
                let track = value;

                switch (value) {
                    case '^':
                        direction = [0, -1];
                        track = '|';
                        this.carts.push(new Cart(position, direction))
                        break;
                    case 'v':
                        direction = [0, 1];
                        track = '|';
                        this.carts.push(new Cart(position, direction))
                        break;
                    case '<':
                        direction = [-1, 0];
                        track = '-';
                        this.carts.push(new Cart(position, direction))
                        break;
                    case '>':
                        direction = [1, 0];
                        track = '-';
                        this.carts.push(new Cart(position, direction))
                        break;
                }
                return track;
            });
        });
    }
}

module.exports = Parser;
