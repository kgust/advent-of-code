class PowerRack {
    constructor(gridSerial) {
        this.gridSerial = gridSerial;
    }

    powerLevel(x, y) {
        // get the Rack ID
        const rackId = x + 10;

        // start the power level
        let level = rackId * y;
        // Add the serial number
        level += this.gridSerial;
        // Multiply the Rack ID
        level *= rackId;

        level = String(level).split('');
        level.pop();
        level.pop();
        const hundreds = Number(level.pop());

        return hundreds - 5;
    }

    gridPowerLevel(x, y, size) {
        let totalPower = 0;
        for (let col = x; col < x + size; col++) {
            for (let row = y; row < y + size; row++) {
                totalPower += this.powerLevel(col, row);
            }
        }
        return totalPower;
    }

    largestGridPower(size) {
        let largest = 0;
        let largestGrid = [0, 0];

        for (let col = 1; col <= 300-size; col++) {
            for (let row = 1; row <= 300-size; row++) {
                let gridTotal = this.gridPowerLevel(col, row, size);
                if (gridTotal > largest) {
                    largest = gridTotal;
                    largestGrid = [col, row];
                }
            }
        }

        return [largestGrid, largest];
    }

    largestVariableGridPower() {
        let largest = 0;
        let largestGrid = [];
        let largestSize = 0;

        for (let size = 1; size <= 300; size++) {
            console.log(size);
            let gridPower = this.largestGridPower(size);
            if (gridPower[1] > largest) {
                largest = gridPower[1];
                largestGrid = gridPower[0];
                largestSize = size;
            }
        }

        return [largestGrid[0], largestGrid[1], largestSize];

    }
}

module.exports = PowerRack;
