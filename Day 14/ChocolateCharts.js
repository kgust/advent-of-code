/**
 * ChocolateCharts.js
 * @param iterations
 * @returns string
 */

function partOne(limit, showExtra = false) {
    let score = '37';
    let elf1 = 0;
    let elf2 = 1;
    while (score.length < limit + 10) {
        score += String(Number(score[elf1]) + Number(score[elf2]));
        elf1 = (elf1 + Number(score[elf1]) + 1) % score.length;
        elf2 = (elf2 + Number(score[elf2]) + 1) % score.length;
    }

    if (!showExtra) return score.substring(0, limit);
    return score.substring(limit, limit + 10);
}

function partTwo(search) {
    let score = '37';
    let elf1 = 0;
    let elf2 = 1;
    while (!score.indexOf(search) !== -1) {
        score += String(Number(score[elf1]) + Number(score[elf2]));
        elf1 = (elf1 + Number(score[elf1]) + 1) % score.length;
        elf2 = (elf2 + Number(score[elf2]) + 1) % score.length;
    }

    return score.indexOf(search);
}

module.exports = { partOne: partOne, partTwo, partTwo };