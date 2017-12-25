// index.test.js
const captchaCalc = require('../captchaCalc');

test('expect 1122 to equal 3', () => {
    expect(captchaCalc('1122')).toBe(3);
});

test('expect 1111 to equal 4', () => {
    expect(captchaCalc('1111')).toBe(4);
});

test('expect 1234 to equal 0', () => {
    expect(captchaCalc('1234')).toBe(0);
});

test('expect 91212129 to equal 9', () => {
    expect(captchaCalc('91212129')).toBe(9);
});
