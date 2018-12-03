const Parser = require('./Parser');

// Pseudo Code
// 1. Walk through the requested tiles, marking them in a list.
// 2. If the tile already exists in the list, mark it as overlap.
// 3. Count the overlaps

module.exports = function(path) {
    let tiles = new Set();
    let overlap = new Set();
    const claims = (new Parser).parse(path);
    claims.forEach(claim => {
        for (let x = claim.position.x; x < claim.position.x + claim.size.width; ++x) {
            for (let y = claim.position.y; y < claim.position.y + claim.size.height; ++y) {
                let tile = `${x}, ${y}`;

                if (tiles.has(tile)) {
                    overlap.add(tile);
                } else {
                    tiles.add(tile);
                }
            }
        }
    });
    return overlap.size;
};