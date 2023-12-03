<?php

declare(strict_types=1);

namespace AdventOfCode\Day02;

use Doctrine\Common\Collections\ArrayCollection;

class PartOne
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
                    $colors = [];
                    foreach ($line as $values) {
                        [$count, $color] = explode(' ', trim($values));
                        $colors[$color] = (int) $count;
                    }
                    return $colors;
                }, $line);
            });

        return $lines->toArray();
    }

    public static function sumValidGames(): int
    {
        $lines = self::parseInput();
        $validIds = self::getValidGameIds($lines);

        $sum = 0;
        foreach ($validIds as $id) {
            $sum += $id;
        }

        return $sum;
    }

    public static function getValidGameIds(array $games): array
    {
        $validIds = [];
        foreach ($games as $index => $game) {
            if (self::isValidGame($game)) {
                $validIds[] = $index + 1;
            }
        }

        return $validIds;
    }

    public static function isValidGame(array $game): bool
    {
        foreach ($game as $draw) {
            if (isset($draw['red'])) {
                if ($draw['red'] > self::RED_CUBES) {
                    return false;
                }
            }
            if (isset($draw['green'])) {
                if ($draw['green'] > self::GREEN_CUBES) {
                    return false;
                }
            }
            if (isset($draw['blue'])) {
                if ($draw['blue'] > self::BLUE_CUBES) {
                    return false;
                }
            }
        }

        return true;
    }
}
