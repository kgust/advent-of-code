<?php
declare(strict_types=1);
namespace Day\Two;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private array $sample = [
        [1,3,'a','abcde'],
        [1,3,'b','cdefg'],
        [2,9,'c','ccccccccc'],
    ];

    public function testParseInput(): void
    {
        $input = require(__DIR__ . '/parse_input.php');
        $this->assertEquals([1,4,'n','nnnnn'], $input[0]);
        $this->assertEquals([5,7,'z','qhcgzzz'], $input[1]);
    }

    public function testSamplePartA(): void
    {
        $input = $this->sample;

        $processor = new Processor();
        $invalidPasswords = $processor->findSledRentalValidPasswords($input);

        $this->assertCount(2, $invalidPasswords);
    }

    public function testInputPartA(): void
    {
        $input = require(__DIR__ . '/parse_input.php');

        $this->assertCount(1000, $input);

        $processor = new Processor();
        $validPasswords = $processor->findSledRentalValidPasswords($input);

        $this->assertLessThan(872, count($validPasswords));
        $this->assertLessThan(870, count($validPasswords));
        $this->assertLessThan(544, count($validPasswords));
        $this->assertCount(456, $validPasswords);
    }

    public function testSamplePartB(): void
    {
        $input = $this->sample;

        $processor = new Processor();
        $validPasswords = $processor->findTobogganValidPasswords($input);

        $this->assertCount(1, $validPasswords);
    }

    public function testInputPartB(): void
    {
        $input = require(__DIR__ . '/parse_input.php');

        $this->assertCount(1000, $input);

        $processor = new Processor();
        $validPasswords = $processor->findTobogganValidPasswords($input);

        $this->assertLessThan(649, count($validPasswords));
        $this->assertGreaterThan(161, count($validPasswords));
        $this->assertCount(308, $validPasswords);
    }
}
