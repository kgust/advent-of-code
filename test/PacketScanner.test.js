// PacketScanner.test.js

const PacketScanner = require('../PacketScanner');
const input = '0: 3\n1: 2\n4: 4\n6: 4\n';

test('parses input', () => {
    const scanner = new PacketScanner(input);
    expect(scanner.input).toEqual([
        [0,3],[1,2],[4,4],[6,4]
    ]);
});

test('test scanner position', () => {
    const scanner = new PacketScanner(input);
    expect(
        [0,1,2,3,4,5,6,7].map(position => scanner.position(position, 3))
    ).toEqual([0,1,2,1,0,1,2,1]);

    expect(
        [0,1,2,3,4,5,6,7].map(position => scanner.position(position, 4))
    ).toEqual([0,1,2,3,2,1,0,1]);

    expect(
        [0,1,2,3,4,5,6,7].map(position => scanner.position(position, 6))
    ).toEqual([0,1,2,3,4,5,4,3]);
});

test('parses input', () => {
    const scanner = new PacketScanner(input);
    expect(scanner.calculateTripSeverity()).toEqual(24);
});
