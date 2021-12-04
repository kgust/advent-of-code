<?php

namespace Test\Kgust\AdventOfCode;

use PHPUnit\Framework\TestCase;
use Kgust\AdventOfCode\Day01;

class Day01Test extends TestCase
{
    /**
     * @dataProvider inputs
     */
    public function testInput(string $path, $first, $second): void
    {
        $values = Day01::parseInput($path);
        $this->assertSame($first, $values[0]);
        $this->assertSame($second, $values[1]);
    }

    /**
     * @dataProvider inputs
     */
    public function testCountGreaterThan(string $path, ...$values): void
    {
        $measurements = Day01::parseInput($path);
        $this->assertSame($values[2], Day01::countGreaterThan($measurements));
    }

    /**
     * @test
     * @dataProvider inputs
     */
    public function countIncreasingDepth(string $path, ...$values): void
    {
        $measurements = Day01::parseInput($path);
        $this->assertSame($values[3], Day01::countIncreasingDepth($measurements));
    }

    public static function inputs(): iterable
    {
        yield 'sample' => ['input/Sample01', 199, 200, 7, 5];
        yield 'input' => ['input/Day01', 168, 166, 1301, 1346];
    }
}
