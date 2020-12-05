<?php
declare(strict_types=1);
namespace Day\Four;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testSamplePassportsAreComplete(): void
    {
        $processor = new Processor();
        $passports = $processor->parseFile(__DIR__ . '/sample');
        $validPassports = $processor->getCompletePassports($passports);

        $this->assertCount(2, $validPassports);
    }

    public function testInputPassportsAreComplete(): void
    {
        $processor = new Processor();
        $passports = $processor->parseFile(__DIR__ . '/input');
        $validPassports = $processor->getCompletePassports($passports);

        $this->assertCount(226, $validPassports);
    }

    public function testInputPassportsAreValid(): void
    {
        $processor = new Processor();
        $passports = $processor->parseFile(__DIR__ . '/input');
        $validPassports = $processor->getValidPassports($passports);

        $this->assertIsArray($validPassports);
        $this->assertGreaterThan(131, count($validPassports));
        $this->assertCount(160, $validPassports);
    }
}
