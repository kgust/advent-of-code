/**
 * ChronalClassification.js
 */
const Processor = require('./Processor');
const compare = (a, b) => a[0] === b[0] && a[1] === b[1] && a[2] === b[2] && a[3] === b[3];

class ChronalClassification {
    constructor(input) {
        this.processor = new Processor();
        this.results = input.map(hint => {
            let count = this.countPossible(hint.before, hint.input, hint.after);
            return count;
        });
    }

    countPossible(registers, input, expected) {
        const funcs = Object.values(this.processor.opcodes);
        const rawResults = funcs.map(f => f(registers.slice(0), input));
        const filteredResults = rawResults.filter(result => compare(result.registers, expected));
        return filteredResults;
    }

    // identifyRegisters(registers, input, expected) {
    //     const funcs = Object.values(this.processor.opcodes);
    //     const raw = funcs.map(func => func(registers.slice(0), input);
    //
    // }
}

module.exports = ChronalClassification;