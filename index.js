// captchaCalc.js
const captcha = require('./captchaCalc');
const readline = require('readline');

const reader = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
    terminal: false
});

reader.on('line', line => {
    console.log(
        captcha(line)
    );
});
