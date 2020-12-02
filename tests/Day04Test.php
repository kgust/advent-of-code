<?php

use Day04\SecureContainer;
use PHPUnit\Framework\TestCase;

class Day04Test extends TestCase
{
    public function testAdjacentNumbers()
    {
        $secureContainer = new SecureContainer();
        $this->assertTrue($secureContainer->adjacentNumbersMatch2(112345));
        $this->assertFalse($secureContainer->adjacentNumbersMatch2(111111));
        $this->assertTrue($secureContainer->adjacentNumbersMatch2(112233));
        $this->assertFalse($secureContainer->adjacentNumbersMatch2(123444));
        $this->assertTrue($secureContainer->adjacentNumbersMatch2(221111));
        $this->assertTrue($secureContainer->adjacentNumbersMatch2(111221));
        $this->assertTrue($secureContainer->adjacentNumbersMatch2(111122));
        $this->assertFalse($secureContainer->adjacentNumbersMatch2(578889));
        $this->assertTrue($secureContainer->adjacentNumbersMatch2(578899));
        $this->assertFalse($secureContainer->adjacentNumbersMatch2(578889));
    }

    public function testPartOne()
    {
        $secureContainer = new SecureContainer();
        $this->assertGreaterThan(460, $secureContainer->howManyValid(145852, 616942));
        $this->assertEquals(1767, $secureContainer->howManyValid(145852, 616942));
    }

    public function testPartTwo()
    {
        $secureContainer = new SecureContainer();
        $this->assertGreaterThan(816, $secureContainer->howManyValid2(145852, 616942));
        $this->assertLessThan(1517, $secureContainer->howManyValid2(145852, 616942));
        $this->assertLessThan(1767, $secureContainer->howManyValid2(145852, 616942));
        $this->assertLessThan(1583, $secureContainer->howManyValid2(145852, 616942));
        $this->assertEquals(1192, $secureContainer->howManyValid2(145852, 616942));
    }
}
