<?php

namespace Kgust\AdventOfCode;

use JetBrains\PhpStorm\Pure;

class Day01
{
    public static function parseInput(string $name): array
    {
        $content = file_get_contents(__DIR__ . '/../' . $name);
        $lines = explode("\n", $content);

        return array_map(fn(string $value) => (int) $value, $lines);
    }

    public static function countGreaterThan(array $measurements): int
    {
        $greater = 0;
        foreach ($measurements as $index => $value) {
            if (isset($measurements[$index + 1]) && $value < $measurements[$index + 1]) {
                $greater += 1;
            }
        }

        return $greater;
    }

    #[Pure]
    public static function countIncreasingDepth(array $measurements): int
    {
        $increasing = 0;
        for ($index = 0; $index < count($measurements) - 2; $index += 1) {
            $first = self::sumWindow(array_slice($measurements, $index, 3));
            $second = self::sumWindow(array_slice($measurements, $index + 1, 3));

            if ($first < $second) {
                $increasing += 1;
            }
        }

        return $increasing;
    }

    private static function sumWindow($values)
    {
        if (count($values) < 3) return 0;

        return $values[0] + $values[1] + $values[2];
    }
}
