// HexEd.js
// Part 1 – answer is 698


class HexEd {
    constructor(input) {
        this.load(input);
    }

    load(input) {
        this.instructions = input.split(',');
        this.x = 0;
        this.y = 0;

        this.instructions.forEach(instruction => {
            switch (instruction) {
                case 'n':
                    this.y--;
                    break;
                case 'ne':
                    this.x++;
                    this.y--;
                    break;
                case 'se':
                    this.x++;
                    break;
                case 's':
                    this.y++;
                    break;
                case 'sw':
                    this.x--;
                    this.y++;
                    break;
                case 'nw':
                    this.x--;
                    break;
                default:
                    throw 'unexpected direction';
            }
            console.log(this.position(), this.steps(), instruction);
        });
    }

    position() {
        return {
            x: this.x,
            y: this.y
        }
    }

    steps() {
        const steps = (
            Math.abs(this.x) +
            Math.abs(-this.x - this.y) +
            Math.abs(this.y)
        ) / 2;


        return steps;
    }
}

module.exports = HexEd;
