// Day 12: Part One
class PartOne {
    constructor(initialState, notes = []) {
        this.initialState = Array(50000).fill('.');
        initialState.split('').forEach((char, index) => {
            this.initialState[index+100] = char;
        });
        this.notes = notes;

        this.currentState = this.initialState;
    }

    display() {
        return this.currentState.join('').substring(97, 300);
    }

    updatePlant(plant) {
        let potValue = '.';
        this.notes.forEach(note => {
            if (plant === note[0]) {
                potValue = note[1];
            }
        });
        return potValue;
    }

    updateAllPlants() {
        let newState = [];
        for (let pot = 0; pot < this.currentState.length-2; pot++) {
            newState[pot] = this.updatePlant(
                this.currentState[pot-2]
                + this.currentState[pot-1]
                + this.currentState[pot]
                + this.currentState[pot+1]
                + this.currentState[pot+2]
            );
        }

        this.currentState = newState;
        return this;
    }

    allGenerations(generations = 20) {
        let output = [this.display()];
        for (let generation = 1; generation <= generations; generation++) {
            output.push(this.updateAllPlants().display());
            console.log(generation, this.calculateValue(this.currentState));
        }
        // console.log(output.join("\n"));

        return this.calculateValue(this.currentState);
    }

    calculateValue(line) {
        let value = 0;
        line.forEach((char, index) => {
            if (char === '#') value += (index - 100);
        });
        return value;
    }
}
module.exports = PartOne;