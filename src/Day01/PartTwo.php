<?php

declare(strict_types=1);

namespace AdventOfCode\Day01;

class PartTwo extends AbstractPart
{
    public static function parseLine(string $line): int
    {
        $numbers = preg_replace(
            '~\D~',
            '',
            static::replaceNumbers($line)
        );
        $first = $numbers[0];
        $last = array_pop($numbers);

        return (int) ($first . $last);
    }

    public static function replaceNumbers(string $line): array
    {
        $replacements = array(
                '1' => 'one',
                '2' => 'two',
                '3' => 'three',
                '4' => 'four',
                '5' => 'five',
                '6' => 'six',
                '7' => 'seven',
                '8' => 'eight',
                '9' => 'nine',
        );

        $results = [];
        for ($i = 0; $i < strlen($line); $i++) {
            if (is_numeric($line[$i])) {
                $results[] = $line[$i];
                continue;
            }

            foreach ($replacements as $number => $word) {
                if (strpos($line, $word, $i) === $i) {
                    $results[] = $number;
                    // $i += strlen($word) - 1;
                }
            }
        }

        // for ($i = 0; $i < strlen($line); $i++) {
        //     if (is_numeric($line[$i])) {
        //         continue;
        //     }
        //
        //     foreach ($replacements as $number => $word) {
        //         try {
        //             if (strpos($line, $word, $i) === $i) {
        //                 $line = str_replace($word, (string) $number, $line);
        //             }
        //         } catch (\Throwable $th) {
        //             // do nothing
        //         }
        //     }
        // }

        return $results;
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
