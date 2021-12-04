<?php

namespace Kgust\AdventOfCode;

class Day03
{

    public static function parseInput(string $path): array
    {
        $contents = file_get_contents(__DIR__ . '/../' . $path);
        $lines = explode("\n", $contents);

        return array_filter($lines);
    }

    public static function calculateGamma(array $lines): array
    {
        $gamma = [];

        foreach (range(0, strlen($lines[0]) - 1) as $index) {
            $ones = 0;
            $zeros = 0;
            foreach ($lines as $line) {
                $line[$index] === '1' ? $ones++ : $zeros++;
            }

            $gamma[$index] = 0;
            if ($ones >= $zeros) {
                $gamma[$index] = 1;
            }
        }

        return $gamma;
    }

    public static function determineO2GeneratorRating(array $numbers, int $position = 0): string
    {
        $mostCommon = self::calculateGamma(array_values($numbers))[$position];

        $filtered = array_filter(
            $numbers,
            fn(string $number) => (int) $number[$position] === $mostCommon
        );

        if (count($filtered) === 1) {
            return array_shift($filtered);
        }

        return self::determineO2GeneratorRating($filtered, $position + 1);
    }

    public static function determineCO2ScrubberRating(array $numbers, int $position = 0): string
    {
        $mostCommon = self::calculateGamma(array_values($numbers))[$position];
        $leastCommon = $mostCommon === 1 ? 0 : 1;

        $filtered = array_filter(
            $numbers,
            fn(string $number) => (int) $number[$position] === $leastCommon
        );

        if (count($filtered) === 1) {
            return array_shift($filtered);
        }

        return self::determineCO2ScrubberRating($filtered, $position + 1);
    }
}
