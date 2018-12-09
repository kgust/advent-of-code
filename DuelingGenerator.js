// DuelingGenerator.js

function* DuelingGenerator (seed, factor) {
    var current = seed;
    while(true) yield current *= factor;
}

module.exports = DuelingGenerator;
