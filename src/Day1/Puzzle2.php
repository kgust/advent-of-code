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
        $this->visited = [
            0 => [0 => true]
        ];

        $instructions = explode(',', str_replace(', ', ',', $instructions));

        foreach ($instructions as $instruction) {
            // Convert the instruction to turn direction, and walking distance
            // R3 - RIGHT, WALK THREE
            $instruction = $this->parseInstruction($instruction); // ['turnDirection' => const::TURN_DIRECTION_RIGHT, 'walkDistance' => 3]
            $this->turn($instruction['turnDirection']);

            for ($i = 1; $i <= $instruction['walkDistance']; $i++) {
                $this->walk(1);
                if (!array_key_exists($this->getX(), $this->visited)) {
                    $this->visited[$this->getX()] = [];
                }

                // We've already visited this intersection
                if (array_key_exists($this->getY(), $this->visited[$this->getX()])) {
                    return $this->calculation();
                }

                $this->visited[$this->getX()][$this->getY()] = true;
            }
        }

        return $this->calculation();
    }
}
