// spiralMemory.js

function calculate(input) {
    input = parseInt(input, 10);
    let [x,y]=[0,0];
    let [inc,dir,mem]=[1,1,1];

    if (input === 1) return 0;

    for (;;) {
        for (let i = 1; i < inc + 1; i++) {
            mem++;
            x = (dir === 1) ? x + 1 : (dir === 3) ? x - 1 : x;
            y = (dir === 2) ? y + 1 : (dir === 4) ? y - 1 : y;
            if (mem === input) return Math.abs(x) + Math.abs(y);
        }
        dir = (dir === 4) ? 1 : dir + 1;
        if ((dir === 1) || (dir === 3)) inc++;
    }
}

module.exports = calculate;
