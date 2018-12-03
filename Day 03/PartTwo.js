const Parser = require('./Parser');

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
    let claimId = '';
    claims.forEach(claim => {
        let hasOverlap = false;
        for (let x = claim.position.x; x < claim.position.x + claim.size.width; ++x) {
            for (let y = claim.position.y; y < claim.position.y + claim.size.height; ++y) {
                let tile = `${x}, ${y}`;
                if (overlap.has(tile)) {
                    hasOverlap = true;
                }
            }
        }
        if (!hasOverlap) {
            claimId = claim.id;
        }
    });
    return claimId;
};