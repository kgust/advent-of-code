const Parser = require('./Parser');
const distance = ([x1, y1], [x2, y2]) => Math.abs(x2 - x1) + Math.abs(y2 - y1)
const min = numbers => Math.min.apply(null, numbers);
const max = numbers => Math.max.apply(null, numbers);
const sum = numbers => numbers.reduce((accumulator, currentValue) => accumulator + currentValue);

module.exports = path => {
    const data = new Parser(path).input;
    const upperX = max(data.map(pair => pair[0]));
    const upperY = max(data.map(pair => pair[1]));

    let regionSize = 0;
    for (let x=0; x<upperX; x++) {
        for (let y=0; y<upperY; y++) {
            const distances = data.map(pair => distance(pair, [x, y]));

            if (sum(distances) < 10000) {
                regionSize++;
            }
        }
    }

    return regionSize;
};
