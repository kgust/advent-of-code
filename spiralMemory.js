// spiralMemory.js

function calculate(input) {
    input = parseInt(input, 10);
    let [x,y]=[0,0];
    let [inc,dir]=[1,1];
    let memory = {"0,0":1};
    let g = function(x,y) { return memory[x+","+y] || 0};
    for (;;) {
        for (let i=1;i<inc+1;i++) {
            x = (dir===1) ? x+1 : (dir===3) ? x-1 : x;
            y = (dir===2) ? y+1 : (dir===4) ? y-1 : y;
            memory[x+","+y]=g(x+1,y-1)+g(x+1,y)+g(x+1,y+1)+g(x-1,y-1)+g(x-1,y)+g(x-1,y+1)+g(x,y-1)+g(x,y+1);
            if (memory[x+","+y]>input) return memory[x+","+y];
        }
        dir = (dir===4) ? 1 : dir+1;
        if ((dir===1) || (dir===3)) inc++;
    }
}

module.exports = calculate;
