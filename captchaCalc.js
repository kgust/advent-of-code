// captchaCalc.js

function captchaCalc(input) {
    var values = input.split('');
    var length = values.length;
    var sum = 0;

    for (let i=0; i < length; i++) {
        if (values[i] === values[i+1]) {
            sum += parseInt(values[i], 10);
        }
    }

    if (values[length-1] === values[0]) {
        sum += parseInt(values[length-1], 10);
    }

    return sum;
}

module.exports = captchaCalc;

