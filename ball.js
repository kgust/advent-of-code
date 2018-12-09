var ball, gravity;

function setup() {
    createCanvas(600, 600);
    background(255);
    stroke(0);
    fill(0);

    gravity = .1;

    ball = {
        pos: createVector(width/2, height/2),
        vel: createVector(0, 0),
        accel: createVector(0, gravity),
    };
}

function draw() {
    background(255);
    ball.vel.add(ball.accel);
    ball.pos.add(ball.vel);

    // Here's the stopping magic.
    if (ball.pos.y > height - 10) {
        ball.pos.y = height - 10;
        ball.vel.set(0, 0);
    }
    if (ball.pos.y < 10) {
        ball.pos.y = 10;
        ball.vel.set(0, 0);
    }

    ellipse(ball.pos.x, ball.pos.y, 10, 10);
}

function mouseClicked() {
    gravity *= -1;
    ball.accel.y = gravity;
}
