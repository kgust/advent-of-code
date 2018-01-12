// PacketScanner.js
// Part 1 answer is 748
// Part 2 answer is ??

class PacketScanner {
    constructor(input) {
        this.input = this.parseInput(input);
    }

    calculateTripSeverity() {
        return this.input.reduce((accumulator, current) => {
            const [ level, depth ] = current;
            const position = this.position(level, depth);

            if (position === 0) accumulator += depth * level;
            return accumulator;
        }, 0);
    }

    position(position, magnitude) {
        magnitude = magnitude - 1;
        return  magnitude - Math.abs(position % (2 * magnitude) - magnitude);
    }

    parseInput(input) {
        // Map {0 => 3, 1 => 2, 4 => 4, 6 => 4}
        return input
            .trim()
            .split("\n")
            .map(line => line
                .split(': ')
                .map(value => parseInt(value, 10))
            );
    }
}

module.exports = PacketScanner;
