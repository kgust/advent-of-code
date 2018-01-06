// KnotHash.js

/*
1. Given a list of numbers 0..255
2. And Current position starts with 0
3. And a sequence of lengths
4. Then for each length...
    a. reverse the order of that length elements starting
       with the current position
    b. move current position forward by that length plus skip size
    c. Increase the skip size by one

* Keep in mind the list is circular
    - reversing the elements beyond the end reverses elements at the
      beginning of the list
    - when current position moves past the end of the list, it wraps
      to the front
    - lengths larger than the size of the list should be ignored
*/

class KnotHash {
    constructor (size, input) {
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
        console.log(this.list.length, this.list.slice(0,2));
    }

    encrypt() {
        this.lengths.forEach(length => {
            this.encryptCycle(length);
        });

        return this.list[0] * this.list[1];
    }
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
    input = input.split(',');
    input = input.map(value => {
        return parseInt(value, 10);
    });
    return input;
}

module.exports = { KnotHash, circularReverse };
