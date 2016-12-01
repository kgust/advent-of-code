<?php

namespace Day1;

class Puzzle2 extends Puzzle1
{
    private $visited = [];

    /**
     * @param string $instructions
     *
     * @return int $answer
     */
    public function parse($instructions)
    {
        $this->resetCoordinates();
        $this->visited[0] = [0 => true];

        $instructions = explode(',', str_replace(', ', ',', $instructions));
        $revisited = false;

        foreach ($instructions as $instruction) {
            // Convert the instruction to turn direction, and walking distance
            // R3 - RIGHT, WALK THREE
            $instruction = $this->parseInstruction($instruction); // ['turnDirection' => const::TURN_DIRECTION_RIGHT, 'walkDistance' => 3]
            $this->turn($instruction['turnDirection']);

            for ($i = 0; $i < $instruction['walkDistance'] && !$revisited; $i++) {
                $this->walk(1);
                if (!array_key_exists($this->getX(), $this->visited)) {
                    $this->visited[$this->getX()] = [];
                }

                // We've already visited this intersection
                if (array_key_exists($this->getY(), $this->visited[$this->getX()])) {
                    $revisited = true;
                }

                $this->visited[$this->getX()][$this->getY()] = true;
            }

            if ($revisited) {
                break;
            }
        }

        return abs($this->getX()) + abs($this->getY());
    }
}
