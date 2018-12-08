class PartOne {
    constructor() {
        this.total = 0;
    }

    sum(data) {
        data.metadata.forEach(value => this.total += value);
        data.children.forEach(child => this.sum(child));

        return this.total;
    }
}
module.exports = PartOne;
