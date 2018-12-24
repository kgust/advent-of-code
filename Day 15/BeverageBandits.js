/**
 * BeverageBandits.js
 */

class BeverageBandits {
    constructor(input) {
        this.input = input;
    }
    grid(input) {
        this.grid = input.map(line => {
            return line.split('');
        });
        return this.grid;
    }
    combatants(input) {
        const elves = [];
        const gnomes = [];
        input.forEach((line, y) => {
            line.split('').forEach((row, x) => {
                if (row === 'E') {
                    elves.push([x, y]);
                } else if (row === 'G') {
                    gnomes.push([x, y]);
                }
            });
        });
        return {elves, gnomes};
    }
    display(delim) {
        return this.input.join(delim);
    }
}

module.exports = BeverageBandits;