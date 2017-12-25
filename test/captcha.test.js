// index.test.js
const captchaCalc = require('../captchaCalc');

test('expect 1212 to equal 6', () => {
    expect(captchaCalc('1212')).toBe(6);
});

test('expect 1221 to equal 0', () => {
    expect(captchaCalc('1221')).toBe(0);
});

test('expect 123425 to equal 4', () => {
    expect(captchaCalc('123425')).toBe(4);
});

test('expect 123123 to equal 12', () => {
    expect(captchaCalc('123123')).toBe(12);
});

test('expect 12131415 to equal 4', () => {
    expect(captchaCalc('12131415')).toBe(4);
});
