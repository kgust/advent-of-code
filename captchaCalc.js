// captchaCalc.js

function captchaCalc(input) {
    var values = input.split('');
    var length = values.length;
    var increment = length / 2;
    var sum = 0;

    for (let i=0; i < length; i++) {
        var other = (i + increment) % length;
        if (values[i] === values[other]) {
            sum += parseInt(values[i], 10);
        }
    }

    return sum;
}

module.exports = captchaCalc;
