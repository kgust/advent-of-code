/**
 * Day 13 – Part One
 * This is mostly about tracking the carts and not about the tunnels.
 * Determine the location of the first crash, (7,3) for the sample input.
 *
 * 1. Carts move one at a time
 * 2. Determine the crash status before moving more carts
 * 3. Most people remove the crashed carts, but one person marked them as inactive
 *
 * Another person used complex math to map the cart positions.
 *    - Position: X+Yi
 *    - Changing directions is as simple as multiplying by +1j – clockwise turn or -1j – counter clockwise turn
 *    - NOTE: The Y-axis is flipped (positive = down) so you flip the imaginary part compared to what you'd do
 *      with usual mathematics
 */

const Cart = require('./Cart');

module.exports = class PartOne {
    constructor(data) {
        this.carts = data.carts;
        this.tracks = data.tracks;
        this.crashes = [];
    }

    displayTracks() {
        return this.tracks.map(y => y.join('')).join("\n");
    }

    solve() {
        while(this.crashes.length < 1) this.move();
        // while(this.carts.filter(cart => cart.crashed === false).length > 0) {
        //     this.move();
        // }
    }

    move(steps = 1) {
        if (steps === 0) return;
        for (let step = 0; step < steps; step++) {
            this.carts.sort(this.compare).forEach(cart => {
                cart.position = [
                    cart.position[0] + cart.direction[0],
                    cart.position[1] + cart.direction[1]
                ];
                let matches = this.carts
                    .filter(cart => cart.crashed === false)
                    .filter(currentCart => this.compare(cart.position, currentCart.position) === 0);
                if (matches.length > 1) {
                    matches.forEach(match => match.crashed = true);
                    this.crashes.push(cart.position);
                }
                this.turnCart(cart);
            });
        }
    }

   changeDirection(cart, track) {
        if (track === 1) return cart;
       // every time you turn the corner the magnitude switches to the other value
       // if positive direction, left is positive
       // if negative direction, left is negative
       const magnitude = cart.direction[0] + cart.direction[1];
       const vertical = cart.direction[0] === 0;

       if (
           (magnitude > 0 && !vertical && track === '/')
           || (magnitude < 0 && !vertical && track === '/')
           || (magnitude > 0 && vertical && track === '/')
           || (magnitude < 0 && vertical && track === '/')
           || (magnitude > 0 && !vertical && track === 0)
           || (magnitude > 0 && vertical && track === 2)
           || (magnitude < 0 && !vertical && track === 0)
           || (magnitude < 0 && vertical && track === 2)
       ) {
           cart.direction = cart.direction.map(value => value * -1);
       }

       cart.direction = [ 0 + cart.direction[1], 0 + cart.direction[0] ];

       return cart;
   }

    turnCart(cart) {
        const track = this.tracks[cart.position[1]][cart.position[0]];

        if ('-| '.includes(track)) return;


        if (track === '+') {
            let turn = cart.nextTurn();
            cart = this.changeDirection(cart, turn);
        } else {
            cart = this.changeDirection(cart, track);
        }
    }

    compare(a, b) {
        if (a[1] > b[1]) return 1;
        if (a[1] < b[1]) return -1;

        if (a[1] === b[1]) {
            if (a[0] > b[0]) return 1;
            if (a[0] < b[0]) return -1;
        }
        return 0;
    }
};