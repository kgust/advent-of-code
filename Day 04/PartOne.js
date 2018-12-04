const Parser = require('./Parser');

function PartOne(path) {
    const log = new Parser(path);

    const totalSleepTimes = getTotalSleepTimes(log);
    const longestSleeper = getLargestValue(totalSleepTimes);

    const sleepyGuardsLog = log.get(longestSleeper[0]);
    const longestMinute = getLargestValue(sleepyGuardsLog);

    return Number(longestSleeper[0]) * longestMinute[0];
}

function getTotalSleepTimes(log) {
    const totalSleepTimes = new Map();
    for (const [id, minutes] of log) {
        const vals = Array.from(minutes.values());
        const min = vals.reduce((acc, curr) => acc + curr, 0);
        totalSleepTimes.set(id, min);
    }
    return totalSleepTimes;
}

function getLargestValue(map) {
    const entries = Array.from(map.entries());
    return entries.reduce(
        (longest, curr) => (longest[1] > curr[1] ? longest : curr),
        [0, 0]
    );
}

module.exports = PartOne;
