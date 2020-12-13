<?php
declare(strict_types=1);
namespace Day\Seven;

use PHPUnit\Framework\TestCase;

class HandyHaversacksTest extends TestCase
{
    private $sample = <<<EOT
        light red bags contain 1 bright white bag, 2 muted yellow bags.
        dark orange bags contain 3 bright white bags, 4 muted yellow bags.
        bright white bags contain 1 shiny gold bag.
        muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.
        shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.
        dark olive bags contain 3 faded blue bags, 4 dotted black bags.
        vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.
        faded blue bags contain no other bags.
        dotted black bags contain no other bags.
        EOT;


    public function testParseLine()
    {
        $service = new HandyHaversacks();
        $result = $service->parseLine('light red bags contain 1 bright white bag, 2 muted yellow bags.');

        $this->assertEquals('light red', $result[0]);
        $this->assertEquals(
            ['bright white' => 1, 'muted yellow' => 2],
            $result[1]
        );

        $result = $service->parseLine('muted purple bags contain no other bags.');
        $this->assertEquals([], $result[1]);
    }

    public function testParse()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $service = new HandyHaversacks();
        $input = $service->parse($file);

        $this->assertEquals(
            ['muted cyan' => 3, 'drab white' => 2, 'drab gray' => 1],
            $input['bright teal']
        );
    }

    public function testContainsShinyGoldBags()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $service = new HandyHaversacks();
        $input = $service->parse($file);

        $this->assertTrue($service->containsShinyGoldBag('dim salmon'));
        $this->assertTrue($service->containsShinyGoldBag('dotted silver'));
        $this->assertFalse($service->containsShinyGoldBag('light chartreuse'));
    }

    /**
     * @test
     */
    public function whichSampleBagsCanContainAShinyGoldBag()
    {
        $service = new HandyHaversacks();
        $input = $service->parse($this->sample);

        $possibleBags = $service->findPossibleBags($input);
        $this->assertCount(4, $possibleBags);
    }

    /**
     * @test
     */
    public function whichInputBagsCanContainAShinyGoldBag()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $service = new HandyHaversacks();
        $input = $service->parse($file);

        $possibleBags = $service->findPossibleBags($input);
        $this->assertCount(252, $possibleBags);
    }

    /**
     * @test
     */
    public function howManyBagsAreInside()
    {
        $sample = <<<EOT
            shiny gold bags contain 2 dark red bags.
            dark red bags contain 2 dark orange bags.
            dark orange bags contain 2 dark yellow bags.
            dark yellow bags contain 2 dark green bags.
            dark green bags contain 2 dark blue bags.
            dark blue bags contain 2 dark violet bags.
            dark violet bags contain no other bags.
            EOT;

        $service = new HandyHaversacks();
        $service->parse($sample);

        $this->assertEquals(0, $service->countInsideBags('dark violet'));
        $this->assertEquals(2, $service->countInsideBags('dark blue'));
        $this->assertEquals(6, $service->countInsideBags('dark green'));
        $this->assertEquals(14, $service->countInsideBags('dark yellow'));
        $this->assertEquals(126, $service->countInsideBags('shiny gold'));

        $file = file_get_contents(__DIR__ . '/input');
        $service->parse($file);
        $this->assertEquals(35487, $service->countInsideBags('shiny gold'));
    }
}
