<?php

namespace Test\Kgust\AdventOfCode;

use Kgust\AdventOfCode\Day02;
use PHPUnit\Framework\TestCase;

class Day02Test extends TestCase
{
    public function testParseInput(): void
    {
        $samples = Day02::parseInput('input/Sample02');
        $this->assertEquals(['direction' => 'forward', 'value' => 5], $samples[0]);
    }

    public function testCount(): void
    {
        $this->assertEquals(['forward' => 15, 'down' => 13, 'up' => 3], Day02::count('input/Sample02'));
    }

    /**
     * @dataProvider inputs
     */
    public function testPartOne(string $path, int $expected): void
    {
        $totals = Day02::count($path);
        $calculated = $totals['forward'] * ($totals['down'] - $totals['up']);
        $this->assertSame($expected, $calculated);
    }

    /**
     * @dataProvider inputs
     */
    public function testPartTwo(string $path, ...$expected): void
    {
        [$horizontal, $depth] = Day02::calculatePosition($path);
        $this->assertSame($expected[1], $horizontal * $depth);
    }

    public static function inputs(): iterable
    {
        yield 'sample' => ['input/Sample02', 150, 900];
        yield 'input' => ['input/Day02', 2091984, 2086261056];
    }
}
