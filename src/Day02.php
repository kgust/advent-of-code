<?php

namespace Kgust\AdventOfCode;

class Day02
{
    public static function parseInput(string $path): iterable
    {
        $content = file_get_contents(__DIR__ . '/../' . $path);
        $lines = explode("\n", $content);
        $lines = array_filter($lines);

        return array_map(
            function (string $value) {
                $tuple = explode(' ', $value);

                return ['direction' => $tuple[0], 'value' => (int) $tuple[1]];
            },
            $lines
        );
    }

    public static function count(string $path): iterable
    {
        $vectors = self::parseInput($path);

        $values = ['forward' => 0, 'down' => 0, 'up' => 0];
        foreach ($vectors as $vector) {
            ['direction' => $direction, 'value' => $value] = $vector;
            $values[$direction] += $value;
        }

        return $values;
    }

    public static function calculatePosition(string $path): array
    {
        $vectors = self::parseInput($path);
        $aim = 0;
        $position = ['distance' => 0, 'depth' => 0];

        foreach ($vectors as $vector) {
            if ($vector['direction'] === 'forward') {
                $position['distance'] += $vector['value'];
                $position['depth'] += $vector['value'] * $aim;
            }
            if ($vector['direction'] === 'down') {
                $aim += $vector['value'];
            }
            if ($vector['direction'] === 'up') {
                $aim -= $vector['value'];
            }
        }

        return array_values($position);
    }
}
