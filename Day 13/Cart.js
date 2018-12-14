const Direction = require('./Direction');
module.exports = class Cart {
    constructor(position = [0, 0], direction = [0, 0]) {
        this.position = position;
        this.direction = direction;
        this.turn = 0;
        this.track = '';
        this.crashed = false;
    }
    nextTurn() {
        return this.turn++ % 3;
    }
};