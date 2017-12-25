// passphraseValidator.js
const _ = require('lodash');

function validator(input) {
    let values = input.split(' ');
    values.forEach( (value, index, arr) => {
        arr[index] = value.split('').sort().join('');
    });

    let uniq = _.uniq(values);

    return values.length === uniq.length;
}

module.exports = validator;
