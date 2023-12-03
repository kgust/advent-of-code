<?php

declare(strict_types=1);

namespace AdventOfCode\Day02;

use Doctrine\Common\Collections\ArrayCollection;

class PartTwo
{
    const RED_CUBES = 12;
    const GREEN_CUBES = 13;
    const BLUE_CUBES = 14;

    public static function parseInput(): array
    {
        $lines = file(__DIR__ . '/input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $lines = new ArrayCollection($lines);
        $lines = $lines->map(function (string $line) {
                return substr($line, 8);
            })
            ->map(function (string $line) {
                return explode('; ', $line);
            })
            ->map(function (array $line) {
                return array_map(function (string $line) {
                    return explode(', ', $line);
                }, $line);
            })
            ->map(function (array $line) {
                return array_map(function (array $line) {
                    $colors = ['red' => 0, 'green' => 0, 'blue' => 0];
                    foreach ($line as $values) {
                        [$count, $color] = explode(' ', trim($values));
                        $colors[$color] = (int) $count;
                    }
                    return $colors;
                }, $line);
            });

        return $lines->toArray();
    }

    public static function getMaximumCubesPerGame(array $game): array
    {
        $maximumCubes = [];
        foreach ($game as $raw) {
            foreach (['red', 'green', 'blue'] as $color) {
                $maximumCubes[$color] = max($maximumCubes[$color] ?? 0, $raw[$color]);
            }
        }
        return $maximumCubes;
    }

    public static function getSumOfProducts(array $games): int
    {
        $sum = 0;
        foreach ($games as $game) {
            $maximumCubes = self::getMaximumCubesPerGame($game);
            $sum += $maximumCubes['red'] * $maximumCubes['green'] * $maximumCubes['blue'];
        }
        return $sum;
    }
}
