<?php

use Day01\CalculateFuel;
use PHPUnit\Framework\TestCase;

class DayOneTest extends TestCase
{
    public function testPartOne()
    {
        $calculateFuel = new CalculateFuel(__DIR__ . '/../Day 01/input.txt');
        $this->assertSame(3219099, $calculateFuel->getPartOneTotal());
    }

    public function testPartTwo()
    {
        $calculateFuel = new CalculateFuel(__DIR__ . '/../Day 01/input.txt');
        $this->assertSame(4825810, $calculateFuel->getPartTwoTotal());
    }

    public function testCalculateFuelForMass()
    {
        $calculateFuel = new CalculateFuel(__DIR__ . '/../Day 01/input.txt');
        $this->assertSame(0, $calculateFuel->calculateFuelRequirement(0));
        $this->assertSame(2, $calculateFuel->calculateFuelRequirement(14));
        $this->assertSame(2, $calculateFuel->calculateFuelRequirement(14, true));
        $this->assertSame(654, $calculateFuel->calculateFuelRequirement(1969));
        $this->assertSame(966, $calculateFuel->calculateFuelRequirement(1969, true));
        $this->assertSame(33583, $calculateFuel->calculateFuelRequirement(100756));
        $this->assertSame(50346, $calculateFuel->calculateFuelRequirement(100756, true));
    }
}
