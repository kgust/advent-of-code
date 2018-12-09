var tail = [];
var colors = [
    '#1B998B',
    '#ED217C',
    '#2D3047',
    '#FFFD82',
    '#FF9B71'
];

function setup() {
    createCanvas(600, 600);
    background(255);
    stroke(0);
}

function draw() {
    background(255);

    tail.unshift({
        x: mouseX,
        y: mouseY,
        color: random(colors)
    });

    var count = tail.length;
    var current;
    for (var i=0; i<count; i++) {
        current = tail[i];

        fill(current.color);
        ellipse(current.x, current.y, 15, 15);
    }

    if (count > 10) {
        tail.pop();
    }

    fill(random(colors));
    ellipse(mouseX, mouseY, 15, 15);
}
