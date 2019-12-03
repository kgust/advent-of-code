/**
 * Processor.js
 */
class Processor {
    constructor() {
        this.opcodes = {
            // instruction: [opcode, A, B, output (C)]
            // register 0, 1, 2, 3
            // register A, B, C, D
            // 9 2 1 2: 3,2,1,1 => 3,2,2,1

            addr: (registers, input) => { registers[input[3]] = registers[input[1]] + registers[input[2]]; return {registers: registers, input: input, opcode: 'addr'}; },
            addi: (registers, input) => { registers[input[3]] = registers[input[1]] + input[2]; return {registers: registers, input: input, opcode: 'addi'}; },
            mulr: (registers, input) => { registers[input[3]] = registers[input[1]] * registers[input[2]]; return {registers: registers, input: input, opcode: 'mulr'}; },
            muli: (registers, input) => { registers[input[3]] = registers[input[1]] * input[2]; return {registers: registers, input: input, opcode: 'muli'}; },
            banr: (registers, input) => { registers[input[3]] = registers[input[1]] & registers[input[2]]; return {registers: registers, input: input, opcode: 'banr'}; },
            bani: (registers, input) => { registers[input[3]] = registers[input[1]] & input[2]; return {registers: registers, input: input, opcode: 'bani'}; },
            bonr: (registers, input) => { registers[input[3]] = registers[input[1]] | registers[input[2]]; return {registers: registers, input: input, opcode: 'bonr'}; },
            boni: (registers, input) => { registers[input[3]] = registers[input[1]] | input[2]; return {registers: registers, input: input, opcode: 'boni'}; },
            setr: (registers, input) => { registers[input[3]] = registers[input[1]]; return {registers: registers, input: input, opcode: 'setr'}; },
            seti: (registers, input) => { registers[input[3]] = input[1]; return {registers: registers, input: input, opcode: 'seti'}; },
            gtir: (registers, input) => { registers[input[3]] = input[1] > registers[input[2]] ? 1 : 0; return {registers: registers, input: input, opcode: 'gtir'}; },
            gtri: (registers, input) => { registers[input[3]] = registers[input[1]] > input[2] ? 1 : 0; return {registers: registers, input: input, opcode: 'gtri'}; },
            gtrr: (registers, input) => { registers[input[3]] = registers[input[1]] > registers[input[2]] ? 1 : 0; return {registers: registers, input: input, opcode: 'gtrr'}; },
            eqir: (registers, input) => { registers[input[3]] = input[1] === registers[input[2]] ? 1 : 0; return {registers: registers, input: input, opcode: 'eqir'}; },
            eqri: (registers, input) => { registers[input[3]] = registers[input[1]] === input[2] ? 1 : 0; return {registers: registers, input: input, opcode: 'eqri'}; },
            eqrr: (registers, input) => { registers[input[3]] = registers[input[1]] === registers[input[2]] ? 1 : 0; return {registers: registers, input: input, opcode: 'eqrr'}; },
        }
    }
}

module.exports = Processor;