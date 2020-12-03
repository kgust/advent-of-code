<?php

namespace Day\One;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private $input = [ 1721, 979, 366, 299, 675, 1456 ];

    public function testSampleA()
    {
        $input = $this->input;

        foreach ($input as $key1 => $value1) {
            foreach ($input as $key2 => $value2) {
                if ($key1 === $key2) continue;

                if ($value1 + $value2 === 2020) {
                    $this->assertEquals(514579, $value1 * $value2);
                }
            }
        }
    }

    public function testInputA()
    {
        $input = require('./input.php');

        foreach ($input as $key1 => $value1) {
            foreach ($input as $key2 => $value2) {
                if ($key1 === $key2) continue;

                if ($value1 + $value2 === 2020) {
                    $this->assertEquals(889779, $value1 * $value2);
                }
            }
        }
    }

    public function testSampleB()
    {
        $input = $this->input;

        foreach ($input as $key1 => $value1) {
            foreach ($input as $key2 => $value2) {
                foreach ($input as $key3 => $value3) {
                    if ($value1 + $value2 + $value3 === 2020) {
                        $this->assertEquals(241861950, $value1 * $value2 * $value3);
                    }
                }
            }
        }
    }

    public function testInputB()
    {
        $input = require('./input.php');

        foreach ($input as $key1 => $value1) {
            foreach ($input as $key2 => $value2) {
                foreach ($input as $key3 => $value3) {
                    if ($value1 + $value2 + $value3 === 2020) {
                        $this->assertEquals(76110336, $value1 * $value2 * $value3);

                        return true;
                    }
                }
            }
        }
    }
}
