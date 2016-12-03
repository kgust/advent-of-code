<?php

namespace Day3;

class Puzzle2 extends Puzzle1
{
    public function getAnswer($input)
    {
        $lines = explode("\n", $input);
        $chunks = array_chunk($lines, 3);
        $chunks = array_map(function($lines) {
            $return = [];
            foreach ($lines as $line) {
                preg_match('/^\s+([0-9]{1,3})\s+([0-9]{1,3})\s+([0-9]{1,3})$/', $line, $matches);
                array_shift($matches);
                $return[] = $matches;
            }

            return $return;
        }, $chunks);

        foreach ($chunks as $chunk) {
            // Chunk is an array with 3 elements
            $this->possibleCount += ($this->isPossible([
                $chunk[0][0], $chunk[1][0], $chunk[2][0]
            ])) ? 1 : 0;

            $this->possibleCount += ($this->isPossible([
                $chunk[0][1], $chunk[1][1], $chunk[2][1]
            ])) ? 1 : 0;

            $this->possibleCount += ($this->isPossible([
                $chunk[0][2], $chunk[1][2], $chunk[2][2]
            ])) ? 1 : 0;
        }

        return $this->possibleCount;
    }
}
