// KnotHash.js
// Part 1 answer is 11375

class KnotHash {
    constructor (size, input) {
        console.log(input.length);
        // this.size = size;
        // this.input = input;
        this.list = [...Array(size).keys()];
        this.position = 0;
        this.skipSize = 0;
        this.lengths = parseInput(input);
    }

    encryptCycle(length) {
        if (length <= this.list.length) {
            this.list = circularReverse(this.position, length, this.list);

            this.position += length + this.skipSize;
            this.skipSize++;
        }
    }

    encrypt() {
        for (let i=0; i<64; i++) {
            this.lengths.forEach(length => {
                this.encryptCycle(length);
            });
        }

        return denseHash(this.list);
        // return this.list[0] * this.list[1];
    }
}

function denseHash(sparseHash) {
    let hash = '';
    for (let i=0; i<16; i++) {
        let value = 0;
        for (let j=0; j<16; j++) {
            let index = i * 16 + j;
            value = value ^ sparseHash[index];
        }
        value = value.toString(16);
        if (value.length === 1) value = '0' + value;
        hash = hash + value;
    }
    return hash;
}

function circularReverse(start, length, values) {
    let newArray = [];
    start = start % values.length;
    let stop = (start + length) % values.length;

    for (let i=start; i != stop; i = (i + 1) % values.length) {
        newArray.push(values[i]);
    }

    for (let i=start; i != stop; i = (i + 1) % values.length) {
        values[i] = newArray.pop();
    }
    return values;
}

function parseInput(input) {
    input = input.split('');
    input = input.map(value => {
        return value.charCodeAt(0);
    });

    input = input.concat([17, 31, 73, 47, 23]);
    return input;
}

module.exports = { KnotHash, circularReverse, denseHash };
