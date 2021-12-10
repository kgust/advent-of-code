<?php

namespace Kgust\AdventOfCode;

use Kgust\AdventOfCode\Day04\BingoBoard;

class Day04
{
    public static array $sampleNumbers = [
        7, 4, 9, 5, 11, 17, 23, 2, 0, 14, 21, 24, 10, 16, 13, 6, 15, 25, 12, 22, 18, 20, 8, 19, 3, 26, 1
    ];
    public static array $actualNumbers = [
        31, 88, 35, 24, 46, 48, 95, 42, 18, 43, 71, 32, 92, 62, 97, 63, 50, 2, 60, 58, 74, 66, 15, 87, 57, 34, 14, 3, 54,
        93, 75, 22, 45, 10, 56, 12, 83, 30, 8, 76, 1, 78, 82, 39, 98, 37, 19, 26, 81, 64, 55, 41, 16, 4, 72, 5, 52, 80,
        84, 67, 21, 86, 23, 91, 0, 68, 36, 13, 44, 20, 69, 40, 90, 96, 27, 77, 38, 49, 94, 47, 9, 65, 28, 59, 79, 6, 29,
        61, 53, 11, 17, 73, 99, 25, 89, 51, 7, 33, 85, 70
    ];

    /**
     * @return array<int, BingoBoard>
     */
    public static function parseInput(string $path): array
    {
        $contents = file_get_contents(__DIR__ . '/../' . $path);
        $lines = explode("\n", $contents);
        $filtered = array_values(array_filter($lines));
        $rows = array_map(fn (string $line) => sscanf($line, '%d %d %d %d %d'), $filtered);

        $result = [];
        $numberOfRows = count($rows);
        for ($n = 0; $n < $numberOfRows; $n += 5) {
            $board = new BingoBoard( $rows[$n], $rows[$n + 1], $rows[$n + 2], $rows[$n + 3], $rows[$n + 4] );
            $result[] = $board;
        }

        return $result;
    }

    /**
     * @param array<BingoBoard> $boards
     */
    public static function findFirstWin(array $boards, array $calledNumbers): int
    {
        $wins = self::findAllWins($boards, $calledNumbers);

        return reset($wins);
    }

    /**
     * @param array<BingoBoard> $boards
     */
    public static function findAllWins(array $boards, array $calledNumbers): array
    {
        $wins = [];
        for ($position = 0; $position < count($calledNumbers); $position += 1) {
            $numbers = array_slice($calledNumbers, 0, $position + 1);
            foreach ($boards as $index => $board) {
                if (in_array($index, array_keys($wins))) continue;

                if ($board->hasBingo($numbers)) {
                    $lastNumber = end($numbers);
                    $product = $lastNumber * $board->sumUnmarkedValues($numbers);
                    $wins[$index] = $product;
                }
            }
        }

        return $wins;
    }
}
