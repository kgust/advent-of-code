<?php

namespace Kgust\AdventOfCode;

class Day06
{
    public static function calculateGrowth(int $days, array $initialValues): array
    {
        $values = array_values($initialValues);
        while ($days--) {
            foreach ($values as $index => $value) {
                $values[$index] -= 1;
                if ($values[$index] === -1) {
                    $values[$index] = 6;
                    $values[] = 8;
                }
            }
        }

        return $values;
    }
}
