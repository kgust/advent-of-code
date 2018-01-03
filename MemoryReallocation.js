// MemoryReallocation.js
// distribution cycles: 7864
// loop length: 1695
let previouslySeen = [];

function reallocate(input) {
    reallocateOnce(input);
    let count = 1;

    while(true) {
        if (wasPreviouslySeen(input)) break;
        reallocateOnce(input);
        count++;
    }
    return count;
}

function reallocateOnce(input) {
    previouslySeen.push(input.slice(0));
    let bank = fullestBank(input);
    let blocks = input[bank];
    input[bank] = 0;

    for (let i=bank+1; i < bank+blocks+1; i++) {
        let currentBank = i % input.length;
        input[currentBank]++;
    }
}

function fullestBank(input) {
    const max = Math.max.apply(null, input);

    return input.indexOf(max);
}

function isEqual(one, two) {
    if (one.length !== two.length) return false;

    for (let i=0; i < one.length; i++) {
        if (one[i] !== two[i]) return false;
    }

    return true;
}

function wasPreviouslySeen(input) {
    let matching = false;

    previouslySeen.forEach(seen => {
        if (isEqual(input, seen)) {
            matching = previouslySeen.length - previouslySeen.indexOf(seen);
            console.log('loop length:', matching);
            return false;
        }
    });

    return matching;
}

module.exports = reallocate;
