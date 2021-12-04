<?php

namespace Test\Kgust\AdventOfCode;

use Generator;
use Kgust\AdventOfCode\Day03;
use PHPUnit\Framework\TestCase;

class Day03Test extends TestCase
{
    public function testParseInput(): void
    {
        $input = Day03::parseInput('input/Sample03');
        $this->assertEquals(
            '00100',
            array_shift($input)
        );
    }

    /**
     * @dataProvider partOne
     */
    public function testGetGamma(string $path, array $expected): void
    {
        $lines = Day03::parseInput($path);
        $gamma = Day03::calculateGamma($lines);
        $this->assertEquals($expected, $gamma);
        // 0x18A => 394 * 0xe75 => 3701
    }

    /**
     * @dataProvider partTwo
     */
    public function testO2GeneratorRating(string $path, array $expected): void
    {
        $input = Day03::parseInput($path);
        $this->assertEquals($expected[0], Day03::determineO2GeneratorRating($input)); // 789
        $this->assertEquals($expected[1], Day03::determineCO2ScrubberRating($input)); // 3586
    }

    public static function partOne(): iterable
    {
        yield 'sample' => ['input/Sample03', [1,0,1,1,0]];
        yield 'input' => ['input/Day03', [ 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0 ]];
    }

    public static function partTwo(): Generator
    {
        yield 'sample' => ['input/Sample03', ['10111', '01010']];
        yield 'input' => ['input/Day03', ['001100010101', '111000000010']];
    }
}
