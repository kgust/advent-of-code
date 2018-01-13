// PacketScanner.js
// Part 1 answer is 748
// Part 2 answer is 3873662

class PacketScanner {
    constructor(input) {
        this.input = this.parseInput(input);
    }

    detectSafePassage() {
        let delay = 0;
        while(true) {
            let tripSeverity = this.calculateTripSeverity(delay);
            if (tripSeverity === 0)  {
                return delay;
            }
            delay++;
        }
        return false;
    }

    calculateTripSeverity(delay = 0) {
        return this.input.reduce((accumulator, current, index) => {
            let [ level, depth ] = current;
            let position = this.position(level + delay, depth);

            if (position === 0) {
                accumulator += level * depth;
                if (level === 0) accumulator++;
            }

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
