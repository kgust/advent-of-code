<?php
declare(strict_types=1);

namespace Day\Ten;

use PHPUnit\Framework\TestCase;

class AdapterArrayTest extends TestCase
{
    public function testInput()
    {
        $service = new AdapterArray();
        $this->assertEquals(148, $service->input[2]);
    }

    public function testCreateAdapterChain()
    {
        $service = new AdapterArray();
        $results = $service->createAdapterChain('sample1');
        $this->assertCount(7, $results[1]);
        $this->assertCount(5, $results[3]);

        $results = $service->createAdapterChain('sample2');
        $this->assertCount(22, $results[1]);
        $this->assertCount(10, $results[3]);

        $results = $service->createAdapterChain('input');
        $this->assertCount(70, $results[1]);
        $this->assertCount(27, $results[3]);
    }
}
