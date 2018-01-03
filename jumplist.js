// jumplist.js
let pointer = 0;
let counter = 0;

function* jumplist(input) {
    while(true) {
        counter++;
        let offset = input[pointer];

        if (offset >= 3) {
            input[pointer]--;
        } else {
            input[pointer]++;
        }

        pointer += offset;
        if (pointer >= input.length) return counter;
        yield pointer;
    }
}

module.exports = jumplist;
