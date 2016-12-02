<?php

namespace Day2;

class Puzzle2 extends Puzzle1
{
    protected $grid = [
        [2 => 1],
        [1 => 2, 2 => 3, 3 => 4],
        [5, 6, 7, 8, 9],
        [1 => 'A', 2 => 'B', 3 => 'C'],
        [2 => 'D'],
    ];

    public $gridCoords = ['y' => 2, 'x' => 0];

    public function followInstruction($instruction)
    {
        $instruction = strtoupper($instruction);
        $nextGridCoords = $this->gridCoords;

        switch ($instruction) {
            case 'U':
                $nextGridCoords['y'] -= 1;
                break;

            case 'D':
                $nextGridCoords['y'] += 1;
                break;

            case 'L':
                $nextGridCoords['x'] -= 1;
                break;

            case 'R':
                $nextGridCoords['x'] += 1;
                break;

            default:
                throw new \Exception('Invalid instruction/direction provided: ' . $instruction);
        }

        if (isset($this->grid[$nextGridCoords['y']][$nextGridCoords['x']])) {
            $this->gridCoords = $nextGridCoords;
        }

        $nextKey = $this->grid[$this->gridCoords['y']][$this->gridCoords['x']];

        $this->setCurrentKey((string)$nextKey);

        return $this;
    }
}
