// jumplist.test.js
const input = [0, 3, 0, 1, -3];
const generator = require('../jumplist')(input);

test('should escape after 5 jumps', () => {
    expect(generator.next().value).toBe(0);
    expect(generator.next().value).toBe(1);
    expect(generator.next().value).toBe(4);
    expect(generator.next().value).toBe(1);

    const result = generator.next();
    expect(result.done).toBe(true);
    expect(result.value).toBe(5);
});
