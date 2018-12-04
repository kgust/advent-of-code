const Parser = require('./Parser');

function PartTwo(path) {
    const log = new Parser(path);

    const asleepLogByMinute = getAsleepByMinute(log);
    const mostSleptMinute = getMostSleptMinute(asleepLogByMinute);
    return Number(mostSleptMinute[0]) * mostSleptMinute[1][0];
}

function getAsleepByMinute(log) {
    let map = new Map();
    for (const [id, event] of log) {
        map.set(id, getEntryWithLargestValue(event));
    }

    return map;
}

function getMostSleptMinute(asleepLogByMinute) {
    const mostSleptMinuteArr = Array.from(asleepLogByMinute.entries());
    const mostSleptMinute = mostSleptMinuteArr.reduce((acc, curr) =>
        acc[1][1] > curr[1][1] ? acc : curr
    );
    return mostSleptMinute;
}

function getEntryWithLargestValue(map) {
    const entries = Array.from(map.entries());
    return entries.reduce(
        (longest, curr) => (longest[1] > curr[1] ? longest : curr),
        [0, 0]
    );
}

module.exports = PartTwo;
