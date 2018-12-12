const PowerRack = require('./PowerRack');

test('sample power levels', () => {
    let rack = new PowerRack(8);
    expect(rack.powerLevel(3,5)).toBe(4);
    rack = new PowerRack(57);
    expect(rack.powerLevel(122,79)).toBe(-5);
    rack = new PowerRack(39);
    expect(rack.powerLevel(217,196)).toBe(0);
    rack = new PowerRack(71);
    expect(rack.powerLevel(101,153)).toBe(4);
});

test('What is the largest value?', () => {
    const rack = new PowerRack(5153);
    expect(rack.gridPowerLevel(235,18, 3)).toEqual(31);
});

test('What is the X,Y coordinate of the top-left fuel cell of the 3x3 square with the largest total power?', () => {
    const rack = new PowerRack(5153);
    expect(rack.largestGridPower(3)).toEqual([[235, 18], 31]);
});

test('What is the X,Y,size identifier of the square with the largest total power?', () => {
    const rack = new PowerRack(5153);
    expect(rack.largestVariableGridPower()).toEqual([236,227,12])
});
