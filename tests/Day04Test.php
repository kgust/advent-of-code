<?php

namespace Test\Kgust\AdventOfCode;

use Kgust\AdventOfCode\Day04;
use PHPUnit\Framework\TestCase;

class Day04Test extends TestCase
{
    public function testParseInput()
    {
        $result = Day04::parseInput('input/Sample04');
        $this->assertCount(3, $result);
        $this->assertEquals([21, 9, 14, 16, 7], $result[0]->getValues()[2]);
    }

    public function testHorizontalBingo()
    {
        $boards = Day04::parseInput('input/Sample04');
        $calledNumbers = [7, 4, 9, 5, 11, 17, 23, 2, 0, 14, 21];
        $this->assertFalse($boards[2]->hasBingo($calledNumbers));
        $calledNumbers[] = 24;
        $this->assertTrue($boards[2]->hasBingo($calledNumbers));
    }

    public function testVerticalBingo()
    {
        $boards = Day04::parseInput('input/Sample04');
        $calledNumbers = [7, 4, 9, 10, 18, 22, 2];
        $this->assertFalse($boards[2]->hasBingo($calledNumbers));
        $calledNumbers[] = 14;
        $this->assertTrue($boards[2]->hasBingo($calledNumbers));
    }

    public function testFindFirstWin()
    {
        $boards = Day04::parseInput('input/Sample04');
        $product = Day04::findFirstWin($boards, Day04::$sampleNumbers);
        $this->assertSame(4512, $product);

        $boards = Day04::parseInput('input/Day04');
        $product = Day04::findFirstWin($boards, Day04::$sampleNumbers);
        $this->assertGreaterThan(19171, $product);
        $this->assertSame(19171, $product);
    }
}
