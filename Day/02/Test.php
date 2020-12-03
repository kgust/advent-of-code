<?php

namespace Day\Two;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private $sample = [
        [1,3,'a','abcde'],
        [1,3,'b','cdefg'],
        [2,9,'c','ccccccccc'],
    ];

    public function testParseInput()
    {
        $input = require('parse_input.php');
        $this->assertEquals([1,4,'n','nnnnn'], $input[0]);
        $this->assertEquals([5,7,'z','qhcgzzz'], $input[1]);
    }

    public function testSamplePartA()
    {
        $input = $this->sample;

        $processor = new Processor();
        $invalidPasswords = $processor->findSledRentalValidPasswords($input);

        $this->assertEquals(2, count($invalidPasswords));
    }

    public function testInputPartA()
    {
        $input = require('parse_input.php');

        $this->assertEquals(1000, count($input));

        $processor = new Processor();
        $validPasswords = $processor->findSledRentalValidPasswords($input);

        $this->assertLessThan(872, count($validPasswords));
        $this->assertLessThan(870, count($validPasswords));
        $this->assertLessThan(544, count($validPasswords));
        $this->assertEquals(456, count($validPasswords));
    }

    public function testSamplePartB()
    {
        $input = $this->sample;

        $processor = new Processor();
        $validPasswords = $processor->findTobogganValidPasswords($input);

        $this->assertEquals(1, count($validPasswords));
    }

    public function testInputPartB()
    {
        $input = require('parse_input.php');

        $this->assertEquals(1000, count($input));

        $processor = new Processor();
        $validPasswords = $processor->findTobogganValidPasswords($input);

        $this->assertLessThan(649, count($validPasswords));
        $this->assertGreaterThan(161, count($validPasswords));
        $this->assertEquals(308, count($validPasswords));
    }
}
