<?php

namespace Day3;

class Puzzle1
{
    protected $possibleCount = 0;

    public function __invoke($input)
    {
        return $this->getAnswer($input);
    }

    public function getAnswer($input)
    {
        $lines = explode("\n", $input);

        foreach ($lines as $line) {
            preg_match('/^\s+([0-9]{1,3})\s+([0-9]{1,3})\s+([0-9]{1,3})$/', $line, $matches);
            array_shift($matches);

            $matches = array_map(function ($value) {
                return (int) $value;
            }, $matches);

            $possible = $this->isPossible($matches);

            if ($possible) {
                $this->possibleCount++;
            }
        }

        return $this->possibleCount;
    }

    public function isPossible(array $lengths = [])
    {
        sort($lengths);

        if (count($lengths) != 3) {
            throw new \Exception('Invalid element count in lengths: ' . count($lengths));
        }

        return ($lengths[0] + $lengths[1]) > $lengths[2];
    }
}
