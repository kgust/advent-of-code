// DuelingGenerators.test.js
const DuelingGenerator = require('../DuelingGenerator');

test('Generator A produces...', () => {
    const genA = new DuelingGenerator(65, 8921);
    expect(genA().next().value).toBe('1092455');
    // expect(generator.genA().next().value).toBe('1181022009');
    // expect(generator.genA().next().value).toBe('245556042');

    const genB = new DuelingGenerator(16807, 48271);
    expect(genB().next().value).toBe('430625591');
});
