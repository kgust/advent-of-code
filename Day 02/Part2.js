const Parse = require('./Parse');

module.exports = function() {
    let arr = new Parse('./Day 02/input.txt').input;
    for (let i = 0; i < arr.length; i++) {
        for (let j = i + 1; j < arr.length; j++) {
            const charsI = [...arr[i]]
            const charsJ = [...arr[j]]

            let diff = charsI.reduce((a, c, i) => a + (c === charsJ[i] ? 0 : 1), 0)

            if (diff === 1) {
                console.log(arr[i])
                console.log(arr[j])
                break;
            }
        }
    }
    return false;
};
