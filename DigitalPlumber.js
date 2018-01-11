// DigitalPlumber.js
// Part 1 answer is 380
// Part 2 answer is 181

class DigitalPlumber {
    constructor(input) {
        this.input = this.parseInput(input);
    }

    traverse(array, connections, previousVisits = []) {
        const pipes = connections
            .filter(x => !previousVisits.has(x));

        for (let i=0; i<pipes.length; i++) {
            previousVisits.add(pipes[i]);
            this.traverse(array, array[pipes[i]], previousVisits);
        }

        return previousVisits;
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

    countGroups() {
        return [...new Set(
            this.input.map((current, index, array) =>
                [...this.traverse(array, current, new Set())].sort().join(',')
            )
        )].length;
    }
}

module.exports = DigitalPlumber;
