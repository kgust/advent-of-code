const fs = require('fs');
const sample = fs.readFileSync('./Day 15/sample.txt').toString().trim("\n").split("\n");
const BeverageBandits = require('./BeverageBandits');

test('should find nine combatants in sample data', () => {
    const arena = new BeverageBandits(sample);
    const combatants = arena.combatants(arena.input);

    expect (combatants.elves.length + combatants.gnomes.length).toBe(9);
    expect(combatants.elves.length).toBe(1);
    expect(combatants.gnomes.length).toBe(8);
});

test('is in range of a target?', () => {
    const arena = new BeverageBandits(sample);
    const combatants = arena.combatants(arena.input);
    const grid = arena.grid(arena.input);

    expect(grid[1][1]).toEqual('G');
    expect(arena.combatantsInRange([1,1])).toEqual(0);
});

/**
 *  1. Each opponent takes it's turn left to right, top to bottom
 *  2. Each opponent tries to move into range of an enemy (if it isn't)
 *  3. Each opponent then attacks
 *  4. Moves are only up, down, left, and right
 *  5. When multiple choices are valid, ties are broken in reading order...
        a. top to bottom, then left to right

 *  1. Each unit begins it's turn by identifying all possible targets
 *      a. When there are no enemy units, combat ends
 *  2. Then the unit identifies all open squares (.) that are **in range** of
 *      of each target
 *      a. Alternatively, the unit may already be in range of a target
 *      b. If the unit is not in range of a target, and there are no open
 *          squares in range of a target, the unit ends it's turn.
 *  3. To move, the unit first considers the squares in range and determines which
 *      of those squares it can reach in the fewest steps.
 *      a. A step is a single movement to any adjacent open (.) square.
 *      b. A unit cannot move into a wall or another unit.
 *      c. It only considers where a unit is not, not where it will move to.
 *      d. If a unit cannot find an open path to any squares in range, it's turn ends.
 *      e. If there are two enemies with equal paths, the one in reading order wins.
 *  3. If the unit is already in range of a target, it does not move, it attacks.

 *  1. To attack, the unit determines all of the targets immediately adjacent to it.
 *      a. The target with the fewest hit points is selected;
 *      b. In a tie, reading order is used
 *  2. The unit deals damage equal to it's attack power to the selected target,
 *     reducing it's hit points by that amount
 *  3. Any unit damaged to 0 or less hit points dies and it's square becomes open (.)
 *  4. All units start with 3 attack power and 200 hit points.
 *  5.
 */
