<?php

declare(strict_types=1);

namespace Day\Nine;

use PHPUnit\Framework\TestCase;

class EncodingErrorTest extends TestCase
{
    public function testInput()
    {
        $service = new EncodingError();
        $this->assertSame(13, $service->input[2]);
    }

    public function testSlidingSums()
    {
        $service = new EncodingError();
        $sums = $service->generateSums($service->sample, 0, 2);
        $this->assertEquals([55], $sums);

        $sums = $service->generateSums($service->sample, 0, 3);
        $this->assertEquals([55, 50, 35], $sums);

        $sums = $service->generateSums($service->sample, 0, 4);
        $this->assertEquals([55, 50, 60, 35, 45, 40], $sums);

        $sums = $service->generateSums($service->sample, 0, 5);
        $this->assertEquals([55, 50, 60, 82, 35, 45, 67, 40, 62, 72], $sums);

        $sums = $service->generateSums($service->sample, 2, 2);
        $this->assertEquals([40], $sums);
    }

    public function testFindCorruptValueInSample()
    {
        $service = new EncodingError();
        $corruptValue = $service->findCorruptValue($service->sample, 5);

        $this->assertEquals(127, $corruptValue);
    }

    public function testFindCorruptValueInInput()
    {
        $service = new EncodingError();
        $corruptValue = $service->findCorruptValue($service->input, 25);

        $this->assertEquals(393911906, $corruptValue);
    }

    public function testFindEncryptionWeaknessInSample()
    {
        $service = new EncodingError();
        $weakness = $service->findEncryptionWeakness($service->sample, 127);

        $this->assertEquals(62, $weakness);
    }

    public function testFindEncryptionWeaknessInInput()
    {
        $service = new EncodingError();
        $weakness = $service->findEncryptionWeakness($service->input, 393911906);

        $this->assertEquals(59341885, $weakness);
    }
}
