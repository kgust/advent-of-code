// jumplist.js
let pointer = 0;
let counter = 0;

function* jumplist(input) {
    while(true) {
        counter++;
        let jump = input[pointer];
        // console.log(jump, pointer);
        input[pointer]++;
        pointer += jump;
        if (pointer >= input.length) return counter;
        yield pointer;
    }
}

module.exports = jumplist;
