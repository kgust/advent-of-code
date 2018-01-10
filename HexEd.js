// HexEd.js
// Part 1 – answer is 698
// Part 2 – answer is 1435


class HexEd {
    constructor(input) {
        this.load(input);
    }

    load(input) {
        this.instructions = input.split(',');
        this.x = 0;
        this.y = 0;
        this.furthest = 0;

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
            this.furthest = Math.max(this.furthest, this.steps());
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

