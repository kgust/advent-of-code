<?php
declare(strict_types=1);
namespace Day\Ten;

class AdapterArray
{
    public array $sample1 = [1, 4, 5, 6, 7, 10, 11, 12, 15, 16, 19];
    public array $sample2 = [28, 33, 18, 42, 31, 14, 46, 20, 48, 47, 24, 23, 49, 45, 19, 38, 39, 11, 1, 32, 25, 35, 8, 17, 7, 9, 4, 2, 34, 10, 3 ];
    public array $input;

    public function __construct()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $this->input = array_map(
            fn($line) => (int) $line,
            explode("\n", trim($file))
        );
    }

    public function createAdapterChain(string $inputType): array
    {
        $input = $this->{$inputType};
        $deviceJoltage = max($input) + 3;
        sort($input);
        array_unshift($input, 0);
        $input[] = $deviceJoltage;

        $size = count($input) - 1;

        $results = [];
        for ($i = 0; $i < $size; $i++) {
            $index = $input[$i + 1] - $input[$i];
            if (!isset($results[$index])) {
                $results[$index] = [];
            }
            $results[$index][] = $input[$i];
        }

        return $results;
    }
}
