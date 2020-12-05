<?php
declare(strict_types=1);
namespace Day\Three;

class Processor
{
    /**
     * @var string[]
     */
    private $input;

    /**
     * @param array<string> $input
     */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    /**
     * @param int $right
     * @param int $down
     * @return array<array>
     */
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

    /**
     * @param bool[] $line
     * @param int $position
     * @return bool
     */
    private function isTree(array $line, int $position): bool
    {
        return $line[$position];
    }
}
