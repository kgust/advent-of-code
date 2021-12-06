<?php

namespace Kgust\AdventOfCode;

use Kgust\AdventOfCode\Day04\BingoBoard;
use function _PHPStan_c862bb974\React\Promise\Stream\first;

class Day05
{
    public function __construct($path)
    {
        $input = self::parseInput($path);
        $grid = self::buildGrid($input);
        $grid = self::plotStraightLines($grid, $input);
        self::showGrid($grid);
    }

    public static function parseInput(string $path): array
    {
        $contents = file_get_contents(__DIR__ . '/../' . $path);
        $data = explode("\n", $contents);
        $filtered = array_values(array_filter($data));
        $points = array_map(fn (string $line) => sscanf($line, '%d,%d -> %d,%d'), $filtered);
        $lines = array_map(fn (array $line) => [[$line[0], $line[1]], [$line[2], $line[3]]], $points);

        return $lines;
    }

    public static function getGridSize(array $lines): array
    {
        $startXValues = array_map( fn (array $line) => $line[0][0], $lines);
        $startYValues = array_map( fn (array $line) => $line[0][1], $lines);
        $endXValues = array_map( fn (array $line) => $line[1][0], $lines);
        $endYValues = array_map( fn (array $line) => $line[1][1], $lines);

        return [
            max([max(($startXValues)), max($endXValues)]) + 1,
            max([max(($startYValues)), max($endYValues)]) + 1
        ];
    }

    public static function buildGrid(array $lines): array
    {
        [$width, $height] = self::getGridSize($lines);
        $grid = [];
        for ($row = 0; $row <= $height; $row += 1) {
            for ($column = 0; $column <= $width; $column += 1) {
                $grid[$row][$column] = 0;
            }
        }

        return $grid;
    }

    public static function plotStraightLines(array $grid, $lines): array
    {
        $vertical = array_filter($lines, fn (array $line) => $line[0][0] === $line[1][0]);
        foreach ($vertical as $column) {
            $rows = range($column[0][1], $column[1][1]);
            foreach ($rows as $row) {
                $grid[$row][$column[0][0]] += 1;
            }
        }

        $horizontal = array_filter($lines, fn (array $line) => $line[0][1] === $line[1][1]);
        foreach ($horizontal as $row) {
            $columns = range($row[0][0], $row[1][0]);
            foreach ($columns as $column) {
                $grid[$row[0][1]][$column] += 1;
            }
        }

        return $grid;
    }

    public static function plotDiagonals(array $grid, array $lines): array
    {
        $diagonals = array_filter(
            $lines,
            fn (array $line) => $line[0][0] !== $line[1][0] && $line[0][1] !== $line[1][1]
        );

        foreach ($diagonals as $diagonal) {
            $columnRange = range($diagonal[0][0], $diagonal[1][0]);
            $rowRange = range($diagonal[0][1], $diagonal[1][1]);

            $row = reset($rowRange);
            foreach ($columnRange as $column) {
                $grid[$column][$row] += 1;
                $row = next($rowRange);
            }
        }

        return $grid;
    }

    public static function countIntersections(int $minimum, array $grid)
    {
        $intersections = 0;

        foreach ($grid as $row) {
            foreach ($row as $column) {
                if ($column >= $minimum) {
                    $intersections += 1;
                }
            }
        }

        return $intersections;
    }

    public static function showGrid(array $grid): void
    {
        foreach ($grid as $index => $row) {
            $formatted = array_map(fn ($column) => $column === 0 ? '.' : $column, $row);
            print($index . ': ' . implode(' ', $formatted) . "\n");
        }
    }
}
