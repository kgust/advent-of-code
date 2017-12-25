// passphraseFileValidator.js
// Validate an entire file of passphrases

const isValid = require('./passphraseValidator');

function fileValidator(input) {
    let validLines = 0;
    input.split("\n").forEach(line => {
        if (line.length < 1) return true;
        if (isValid(line)) validLines++;
    });
    return validLines;
}

module.exports = fileValidator;
