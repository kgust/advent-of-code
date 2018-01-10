// DigitalPlumber.js

class DigitalPlumber {
    constructor(input) {
        this.input = this.parseInput(input);
    }

    traverse(array, connections, previousVisits = []) {
        const pipes = connections.filter(x => !previousVisits.includes(x));

        if (pipes.includes(0)) {
            return true;
        }

        for (let i=0; i<connections.length; i++) {
            if (!previousVisits.includes(connections[i])) {
                previousVisits.push(connections[i]);

                if (this.traverse(array, array[connections[i]], previousVisits)) {
                    return true;
                }
            }
        }

        return false;
    }

    parseInput(input) {
        return input
            .split('\n')
            .map(line => line
                .trim()
                .split(' <-> ')[1]
                .split(', ')
                .map(x => parseInt(x, 10))
            );
    }

    reduce() {
        return this.input
            .reduce((carry, value, index, array) => {
                return carry + (this.traverse(array, value) ? 1 : 0);
            }, 0);
    }
}

module.exports = DigitalPlumber;
