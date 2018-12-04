const fs = require('fs');

class Parser {
    constructor(path) {
        this.input = fs.readFileSync(path).toString().trim("\n").split("\n");
        const events = this.input.map(this.parse);
        const guards = this.createGuards(events);
        return this.populateMinutes(events, guards);
    }

    parse(line) {
        const isBeginShift = /begins/.test(line);

        return {
            timestamp: new Date(/(?<=\[).*?(?=\])/.exec(line)[0]),
            isBeginShift: isBeginShift,
            isSleep: /sleep/.test(line),
            guardId: isBeginShift ? /(?<=#)\d+/.exec(line)[0] : null
        };
    }

    createGuards(events) {
        const guardIds = events
            .filter(event => event.guardId)
            .map(event => [event.guardId, new Map()]);
        const log = new Map(guardIds);
        return log;
    }

    populateMinutes(events, log) {
        let guard = null;
        let sleepTime = null;
        events.forEach(event => {
            if (event.isBeginShift) {
                guard = log.get(event.guardId);
                return;
            }
            if (event.isSleep) {
                sleepTime = event.timestamp;
                return;
            }
            if (!event.isSleep) {
                const sleepMin = (event.timestamp - sleepTime) / 1000 / 60;
                for (let i = sleepTime.getMinutes(); i < sleepTime.getMinutes() + sleepMin; i++) {
                    let minute = i % 60;
                    if (!guard.has(minute)) {
                        guard.set(minute, 1);
                    } else {
                        let count = guard.get(minute);
                        guard.set(minute, ++count);
                    }
                }
            }
        });
        return log;
    }
}

module.exports = Parser;
