class PartTwo {
    constructor() {
        this.total = 0;
    }

    value(data) {
        data.children.forEach(child => this.value(child));

        data.value = 0;

        if (data.children.length === 0) {
            data.metadata.forEach(value => data.value += value);
            return data.value;
        }

        data.metadata.forEach(index => {
            data.value +=
                (data.children[index-1] !== undefined)
                ? data.children[index-1].value
                : 0;
        });
        return data.value;
    }
}
module.exports = PartTwo;