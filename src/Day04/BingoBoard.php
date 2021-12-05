<?php

namespace Kgust\AdventOfCode\Day04;

class BingoBoard
{
    /**
     * @var array<int, array<int, int>>
     */
    private array $values;

    public function __construct(array ...$values)
    {
        $this->values = $values;
    }

    public function sumUnmarkedValues(array $called)
    {
        $allValues = array_merge(
            $this->values[0],
            $this->values[1],
            $this->values[2],
            $this->values[3],
            $this->values[4],
        );

        $allMarked = array_intersect($called, $allValues);
        $unMarked = array_diff($allValues, $allMarked);

        return array_sum($unMarked);
    }

    public function hasBingo(array $calledNumbers): bool
    {
        return $this->hasBingoRow($calledNumbers) || $this->hasBingoColumn($calledNumbers);
    }

    public function getValues()
    {
        return $this->values;
    }

    private function hasBingoRow(array $calledNumbers): bool
    {
        foreach ($this->values as $row) {
            $intersection = array_intersect($calledNumbers, $row);

            if (count($intersection) === 5) {
                return true;
            }
        }

        return false;
    }

    private function hasBingoColumn(array $calledNumbers): bool
    {
        for ($position = 0; $position < 5; $position += 1) {
            $column = array_map(fn (array $row) => $row[$position], $this->values);
            $intersection = array_intersect($calledNumbers, $column);

            if (count($intersection) === 5) {
                return true;
            }
        }

        return false;
    }
}
