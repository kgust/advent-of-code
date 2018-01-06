// StreamProcessor.js
// Answer to Part 1 is 16827

module.exports = input => {
    input = input.replace("\n", '');
    console.log(input);
    input = decancel(input);
    console.log(input);
    input = cleanGarbage(input);

    return countGroups(input);
};

function countGroups(input) {
    let score = 0;
    let lastScore = 0;

    input.split('').forEach(char => {
        if (char === '{') score += lastScore++ + 1;
        if (char === '}') lastScore--;
    });

    return score;
}

function cleanGarbage(input) {
    return input.replace(/\<.*?\>/g, '');
}

function decancel(input) {
    console.log(typeof input);
    return input.replace(/!./g, '');
}
