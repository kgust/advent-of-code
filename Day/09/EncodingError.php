<?php
declare(strict_types=1);

namespace Day\Nine;

class EncodingError
{
    public array $sample = [
        35, 20, 15, 25, 47,
        40, 62, 55, 65, 95, 102,
        117, 150, 182, 127, 219,
        299, 277, 309, 576
    ];

    public array $input = [];

    public function __construct()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $this->input = array_map(
            fn($line) => (int) $line,
            explode("\n", trim($file))
        );
    }

    public function generateSums(array $input, int $start, int $size): array
    {
        $end = $start + $size;

        $sums = [];
        for ($i = $start; $i < $end - 1; $i++)
        {
            for ($j = $i + 1; $j < $end; $j++) {
                $sums[] = $input[$i] + $input[$j];
            }
        }

        return $sums;
    }

    public function findCorruptValue($input, $windowSize): int
    {
        $inputSize = count($input);

        for ($i = $windowSize; $i < $inputSize; $i++) {
            $sums = $this->generateSums($input, $i - $windowSize, $windowSize);

            if (!in_array($input[$i], $sums)) {
                return $input[$i];
            }
        }

        return -1;
    }

    public function findEncryptionWeakness($input, $corruptValue): int
    {
        $inputSize = count($input);

        for ($i = 0; $i < $inputSize; $i++) {
            $windowSize = 1;
            $accumulator = $input[$i];
            $values = [$input[$i]];
            while (true) {
                if ($i + $windowSize > $inputSize) {
                    break;
                }

                $accumulator += $input[$i + $windowSize];
                $values[] = $input[$i + $windowSize];

                if ($accumulator === $corruptValue) {
                    $value = min($values) + max($values);
                    $equation = sprintf("%s,%s: %s + %s = %s\n", $i, $windowSize, min($values), max($values), $value);

                    return $value;
                }

                if ($accumulator > $corruptValue) {
                    break;
                }

                $windowSize++;
            }
        }

        return -1;
    }
}
