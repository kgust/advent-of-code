const min = numbers => Math.min.apply(null, numbers);
const max = numbers => Math.max.apply(null, numbers);

class PartOne {
    constructor(data) {
        this.data = data;
    }

    after(seconds) {
        const stars = this.data.map(values => {
            const x = values[0];
            const y = values[1];
            const xVelocity = values[2];
            const yVelocity = values[3];

            return [
                x + (xVelocity * seconds),
                y + (yVelocity * seconds),
            ];
        });
        return this.display(stars);
    }

    display(stars) {
        // identify the edges
        const offset = {
            maxX: max(stars.map(star => star[0])),
            minX: 0 - min(stars.map(star => star[0])),
            maxY: max(stars.map(star => star[1])),
            minY: 0 - min(stars.map(star => star[1]))
        };
        const width = 1 + offset.maxX + offset.minX;
        const height = 1 + offset.maxY + offset.minY;
        console.log(offset);
        if (width > 200) return '';

        // create the playing field
        const starmap = Array(height);
        for (let a = 0; a < height; a++) {
            starmap[a] = Array(width).fill(' ');
        }

        // place the stars on the field
        stars.forEach(star => {
            starmap[star[1] + offset.minY][star[0] + offset.minX] = '#';
        });

        return starmap.map(line => line.join('')).join("\n");
    }
}

module.exports = PartOne;
