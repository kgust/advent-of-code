// StreamProcessor.js
// Answer to Part 1 is 16827
// Part 2...
//     8109 is too high
//     5889 is too low
//     7298 is just right

module.exports = input => {
    input = input.replace("\n", '');
    console.log(input);
    input = decancel(input);
    console.log(input);
    return countGarbage(input);

    // input = cleanGarbage(input);
    // return countGroups(input);
};

function countGarbage(input) {
    let count = 0;
    let isGarbage = false;

    input.split('').forEach(char => {
        if (char === '>') {
            isGarbage = false;
            return true;
        }

        if (char === '<') {
            if (isGarbage) count++;
            isGarbage = true;
            return true;
        }

        if (isGarbage) count++;
    });
    return count;
}

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
