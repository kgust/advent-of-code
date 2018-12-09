// lesson2/example 1/sketch.js

function setup() {
    createCanvas(600, 600);
    background(125);
    noStroke();
    noLoop();
}

function draw() {
    // createTarget(width/2, height/2, 400, 10);
    // createTarget(100, 400, 200, 5);
    // createTarget(400, 400, 300, 6);
    // for (var i=0; i < 5; i++) {
    //     createTarget(40 + i * 100, 50 + i * 125, 100 + i * 50, 5 + i);
    // }
}

function mouseClicked() {
    createRandomTarget(mouseX, mouseY);
}

function createRandomTarget(x, y) {
    var maxSize = random(25, 350);
    var steps = random(1, 10);
    createTarget(x, y, maxSize, steps);
}

function createTarget(x, y, maxSize, steps) {
    var sizeStep = maxSize / steps; // We'll use this to define our ring sizes
    var colorStep = 255 / (steps - 1);

    // Draw the circles, start with the biggest, black one on bottom
    for (var i = 0; i < steps; i++) {
        var thisSize = maxSize - (i * sizeStep);
        fill(i * colorStep);
        ellipse(x, y, thisSize, thisSize);
    }
}
