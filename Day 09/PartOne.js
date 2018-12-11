const {CircularList} = require('@jasonheecs/js-data-structures');

class PartOne {
    constructor(players, marbles) {
        this.players = players;
        this.marbles = marbles;

        this.current = 0;
        this.score = {};
        for (let player=1; player <= this.players; player++) {
            this.score[player] = 0;
        }
    }

    play() {
        const list = new CircularList();
        this.current = 0;
        this.score = {};
        for (let player=1; player <= this.players; player++) {
            console.log(player);
            this.score[player] = 0;
        }

        for (let marble = 0; marble < this.marbles; marble++) {
            this.addMarble(marble, list);
        }

        return list;
    }

    addMarble(marble, list) {
        if (list.values.length < 2) {
            list.add(marble);
            this.current = marble;
            return list;
        }

        if (marble % 23 === 0) {
            const player = (marble % this.players) + 1;
            this.score[player] += marble;
            const remove_me = list.search(this.current)
                .previous
                .previous
                .previous
                .previous
                .previous
                .previous
                .previous;
            this.score[player] += Number(remove_me.value);
            this.current = remove_me.next.value;
            // this.current = list.values.split(',').indexOf(String(new_current.value));
            list.delete(remove_me.value);
            return list;
        }

        // console.log(marble, this.current, list.values);
        let value = list.search(this.current).next.value;
        let index = list.values.split(',').indexOf(String(value));

        list.addAtPosition(marble, index+1);
        this.current = marble;
        return list;
    }
}

module.exports = PartOne;
