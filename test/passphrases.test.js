// passphrases.test.js

const validate = require('../passphraseValidator');

test('a valid passphrase should contain no duplicate words', () => {
    const provider = [
        ['aa bb cc dd ee', true],
        ['aa bb cc dd aa', false],
        ['aa bb cc dd aaa', true],
        ['gark karg bark', false]
    ];

    provider.forEach(values => {
        let [input, result] = values;
        expect(validate(input)).toBe(result);
    });
});
