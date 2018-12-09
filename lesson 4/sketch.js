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

        update: function() {
            this.vel.add(this.accel);
            this.pos.add(this.vel);

            if (this.pos.y > height - 10) {
                this.pos.y = height - 10;
            }

            if (this.pos.y < 10) {
                this.pos.y = 10;
            }
        },
        display: function() {
            ellipse(this.pos.x, this.pos.y, 10, 10);
        }
    }

}

function draw() {
    background(255);
    ball.update();
    ball.display();
}

function mouseClicked() {
    gravity *= -1;
    ball.accel.y = gravity;
}
