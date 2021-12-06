<?php

namespace Test\Kgust\AdventOfCode;

use Kgust\AdventOfCode\Day05;
use PHPUnit\Framework\TestCase;

class Day05Test extends TestCase
{
    public function testParseInt()
    {
        $result = Day05::parseInput('input/Sample05');
        $this->assertEquals([[0, 9], [5, 9]], $result[0]);
    }

    public function testGetGridSize()
    {
        $result = Day05::parseInput('input/Sample05');
        $this->assertEquals([10, 10], Day05::getGridSize($result));
    }

    public function testCountIntersection()
    {
        $input = Day05::parseInput('input/Sample05');
        $grid = Day05::buildGrid($input);
        $grid = Day05::plotStraightLines($grid, $input);
        $this->assertSame(5, Day05::countIntersections(2, $grid));

        $input = Day05::parseInput('input/Day05');
        $grid = Day05::buildGrid($input);
        $grid = Day05::plotStraightLines($grid, $input);
        $this->assertSame(4745, Day05::countIntersections(2, $grid));
    }

    public function testCountIntersectionWithDiagnonals()
    {
        $input = Day05::parseInput('input/Sample05');
        $grid = Day05::buildGrid($input);
        $grid = Day05::plotStraightLines($grid, $input);
        $grid = Day05::plotDiagonals($grid, $input);
        $this->assertSame(12, Day05::countIntersections(2, $grid));

        $input = Day05::parseInput('input/Day05');
        $grid = Day05::buildGrid($input);
        $grid = Day05::plotStraightLines($grid, $input);
        $grid = Day05::plotDiagonals($grid, $input);
        $this->assertSame(5, Day05::countIntersections(2, $grid));
    }
}
