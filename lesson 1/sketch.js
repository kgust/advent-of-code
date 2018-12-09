function setup() {
    createCanvas(600, 400);
    x = width/2;
    y = height/2;
    stroke(0);
}

function draw() {
    // background(255);
    // stroke(0);
    // fill(255);
    // rect(100, 100, 200, 200);

    rand = floor(random(4));
    if (rand === 0) {
        x++;
    } else if (rand === 1) {
        x--;
    } else if (rand === 2) {
        y++;
    } else {
        y--;
    }

    point(x, y);
}
