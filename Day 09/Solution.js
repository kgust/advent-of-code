const addAfter = (value, marble) => {
    const toAdd = {
        value,
        prev: marble,
        next: marble.next,
    };
    marble.next.prev = toAdd;
    marble.next = toAdd;
    return toAdd;
};

module.exports = (playerCount, marbleCount) => {
    const scores = {};
    for (let i = 1; i <= playerCount; i += 1) {
        scores[i] = 0;
    }
    let currentPlayer = 1;

    let current = {
        value: 0,
    };
    current.next = current;
    current.prev = current;

    for (let m = 1; m <= marbleCount * 100; m += 1) {
        if (m % 23 === 0) {
            scores[currentPlayer] += m;
            current = current.prev.prev.prev.prev.prev.prev;
            scores[currentPlayer] += current.prev.value;
            current.prev.prev.next = current;
            current.prev = current.prev.prev;
        } else {
            current = addAfter(m, current.next);
        }
        currentPlayer = currentPlayer % playerCount + 1;
    }

    return Math.max(...Object.values(scores));
};
