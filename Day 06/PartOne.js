const Parser = require('./Parser');
const distance = ([x1, y1], [x2, y2]) => Math.abs(x2 - x1) + Math.abs(y2 - y1)
const min = numbers => Math.min.apply(null, numbers);
const max = numbers => Math.max.apply(null, numbers);

module.exports = path => {
    const data = new Parser(path).input;
    const upperX = max(data.map(pair => pair[0]));
    const upperY = max(data.map(pair => pair[1]));

    const closestPoint = Array(upperX).fill().map(() => Array(upperY));

    for (let x = 0; x < upperX; x++) {
        for (let y = 0; y < upperY; y++) {
            const distances = data.map(pair => distance(pair, [x, y]));
            const shortest = min(distances);

            if (distances.filter(d => d === shortest).length === 1) {
                closestPoint[x][y] = distances.indexOf(shortest);
            }
        }
    }

    const toIgnore = new Set();
    for (let n = 0; n < upperX; n++) {
        toIgnore.add(closestPoint[0][n]);
        toIgnore.add(closestPoint[n][0]);
        toIgnore.add(closestPoint[upperX - 1][n]);
        toIgnore.add(closestPoint[n][upperY - 1]);
    }

    const regionSizes = Array(data.length).fill(0);
    for (let x = 0; x < upperX; x++) {
        for (let y = 0; y < upperY; y++) {
            const point = closestPoint[x][y];
            if (!toIgnore.has(point)) {
                regionSizes[point]++;
            }
        }
    }

    return max(regionSizes);
};
