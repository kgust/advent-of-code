class Count {
    constructor(input) {
        this.input = input;
    }

    get count() {
        const values = this.input.split('');
        let DosMatches = false;
        let TresMatches = false;
        let result = {};
        for (let index = 0; index < values.length; ++index) {
            if (!result[values[index]]) result[values[index]] = 0;
            ++result[values[index]];
        }

        for (const key of Object.keys(result)) {
            if (result[key] == 2) {
                DosMatches = true;
            }
            if (result[key] == 3) {
                TresMatches = true;
            }
        }
        return [DosMatches, TresMatches];
    }
}

module.exports = Count;
