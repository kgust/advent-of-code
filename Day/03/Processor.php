<?php

namespace Day\Three;


class Processor
{
    private array $input;

    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function getTreesHit(int $right, int $down = 1): array
    {
        $lines = count($this->input);
        $length = count($this->input[0]);
        $position = 0;
        $treesHit = [];

        for ($index = 0; $index < $lines; $index += $down) {
            $line = $this->input[$index];

            if ($this->isTree($line, $position)) {
                $treesHit[$index] = [$index, $position];
            }

            $position += $right;
            $position = $position % $length;
        }

        return $treesHit;
    }

    public function countTreesHit(int $right, int $down = 1): int
    {
        return count($this->getTreesHit($right, $down));
    }

    private function isTree(array $line, int $position)
    {
        return $line[$position];
    }
}
