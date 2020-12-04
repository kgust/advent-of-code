<?php

namespace Day\Three;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testParseInput()
    {
        $input = require('parse_input.php');

        $this->assertTrue($input[0][1]);
        $this->assertTrue($input[1][0]);
        $this->assertFalse($input[10][4]);
    }

    public function testSampleTreesHit()
    {
        $input = require('parse_sample.php');

        $processor = new Processor($input);
        $treesHit = count($processor->getTreesHit(3));

        $this->assertEquals(7, $treesHit);
    }

    public function testInputTreesHit()
    {
        $input = require('parse_input.php');

        $processor = new Processor($input);
        $treesHit = count($processor->getTreesHit(3));

        $this->assertEquals(193, $treesHit);
    }

    public function testAllSampleSlopes()
    {
        $input = require('parse_sample.php');

        $processor = new Processor($input);

        $this->assertEquals(2, $processor->countTreesHit(1));
        $this->assertEquals(7, $processor->countTreesHit(3));
        $this->assertEquals(3, $processor->countTreesHit(5));
        $this->assertEquals(4, $processor->countTreesHit(7));
        $this->assertEquals(2, $processor->countTreesHit(1, 2));
        $this->assertEquals(336, 2 * 7 * 3 * 4 * 2);
    }

    public function testAllInputSlopes()
    {
        $input = require('parse_input.php');

        $processor = new Processor($input);

        $this->assertEquals(57, $processor->countTreesHit(1));
        $this->assertEquals(193, $processor->countTreesHit(3));
        $this->assertEquals(64, $processor->countTreesHit(5));
        $this->assertEquals(55, $processor->countTreesHit(7));
        $this->assertEquals(35, $processor->countTreesHit(1, 2));
        $this->assertEquals(1355323200, 57 * 193 * 64 * 55 * 35);
    }
}
