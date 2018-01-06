// Processor.js
// 2039 is too low
// 4567 is correct
let registers = new Map();
let allValues = new Set();

module.exports = input => {
    const instructions = input.map(line => { return parseInputLine(line); });
    initializeRegisters(instructions);
    instructions.forEach(instruction => { processInstruction(instruction); });

    //return max(registers); // Part 1
    return max(allValues); // Part 2
};

function max(input) {
    return Math.max(...input.values());
}

/**
 *
 * @param array condition register operator value
 * @returns {boolean}
 */
function meetsCondition(condition) {
    switch (condition[1]) {
        case '>':
            return registers.get(condition[0]) > parseInt(condition[2], 10);
        case '>=':
            return registers.get(condition[0]) >= parseInt(condition[2], 10);
        case '<':
            return registers.get(condition[0]) < parseInt(condition[2], 10);
        case '<=':
            return registers.get(condition[0]) <= parseInt(condition[2], 10);
        case '==':
            return registers.get(condition[0]) == parseInt(condition[2], 10);
        case '!=':
            return registers.get(condition[0]) != parseInt(condition[2], 10);
        default:
            throw 'condition not found';
    }
}

/**
 * Process one instruction.
 *   register = instruction[0];
 *   direction = instruction[1];
 *   value = instruction[2];
 * @param array instruction
 */
function processInstruction(instruction) {
    if (instruction[0] === '') return;
    if (!meetsCondition(instruction.slice(4,7))) return;

    if (instruction[1] === 'inc') {
        registers.set(
            instruction[0],
            registers.get(instruction[0]) + parseInt(instruction[2], 10)
        );
    } else {
        registers.set(
            instruction[0],
            registers.get(instruction[0]) - parseInt(instruction[2], 10)
        );
    }

    allValues.add(registers.get(instruction[0]));
}

function initializeRegisters(input) {
    const set = new Set(
        input.map(value => { return value[0]; })
    );

    set.forEach(register => {
        if (register === '') return true;
        registers.set(register, 0);
    });
}

/**
 * Parse a line of input.
 * register direction amount if register test value
 * @param input
 * @returns {Array|*|string[]}
 */
function parseInputLine(input) {
    return input.split(' ');
}
