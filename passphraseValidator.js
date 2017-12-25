// passphraseValidator.js
const _ = require('lodash');

function validator(input) {
    let values = input.split(' ');
    let uniq = _.uniq(values);

    return values.length === uniq.length;
}

module.exports = validator;
