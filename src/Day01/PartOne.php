<?php

declare(strict_types=1);

namespace AdventOfCode\Day01;

class PartOne extends AbstractPart
{
    public static function parseLine(string $line): int
    {
        $numbers = preg_replace('~\D~', '', $line);
        $first = substr($numbers, 0, 1);
        $last = substr($numbers, -1);
        return (int) ($first . $last);
    }

    public static function sumAllValues(array $array)
    {
        $sum = 0;
        foreach ($array as $line) {
            $value = static::parseLine($line);
            $sum += $value;
        }

        return $sum;
    }
}
