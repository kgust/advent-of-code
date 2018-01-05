// RecursiveCircus.js
const loki = require('lokijs');
const db = new loki('loki.json');

function RecursiveCircus(input) {
    const programs = parseInput(input);
    const rootProgram = findRootProgram(programs);

    console.log(rootProgram.children);
    return findNodeWeight(programs, rootProgram);
    // return rootProgram.children.map(child => {
    //     return findNodeWeight(programs, child);
    // });
    // Starting with the bottom node, find the unbalanced child
    // repeat using the unbalanced child as the new root
    // when you can't recurse any futher, one of the children will have different weight
}

/**
 * 1. Parse the input file
 *    a. Record name
 *    b. Record disc
 *    c. Record weight
 *    d. Record children
 */
function parseInput(input) {
    let programs = db.addCollection('programs');

    input.forEach(line => {
        let values = line.split(' ');

        let name = values.shift();
        if (name === '') return true;
        let program = {name: name, children: []};

        if (values.length > 0) {
            program.weight = parseInt(values.shift().replace(/[()]+/g, ''), 10);
            program.disc = false;
            if (program.weight) { program.disc = true; }

            values.shift();
            values.join(' ').split(', ').forEach(child => {
                if (child !== '') program.children.push(child);
            });
        }

        programs.insert(program);
    });

    return programs;
}

/**
 * 2. Find the bottom node. It will have...
 *    a. a disc
 *    b. weight
 *    c. children
 *    d. no one will claim it as a child
 */
function findRootProgram(programs) {
    return programs.find().filter(p => {
        let matches = programs.find({ 'children': { '$contains': p.name } }).length;
        return matches === 0;
    })[0];
}

function findNodeWeight(programs, node) {
    if (typeof node !== 'object') { node = programs.findOne({name: node}); }

    let weight = 0 + node.weight;

    node.children.forEach(child => {
        weight += findNodeWeight(programs, child);
    });
    console.log(node.name, node.weight, weight, node.children);
    return weight;
}

module.exports = RecursiveCircus;
