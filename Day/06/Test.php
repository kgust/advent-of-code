<?php
declare(strict_types=1);
namespace Day\Six;

use Generator;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testParseSample(): void
    {
        $service = new CustomCustoms();
        $groups = $service->parseSample();

        $this->assertCount(5, $groups);

        $questions = 0;
        foreach ($groups as $group) {
            $questions += count($group) - 1;
        }

        $this->assertEquals(11, $questions);
    }

    public function testTotalQuestionsForAnyone(): void
    {
        $service = new CustomCustoms();
        $groups = $service->parseInput();

        $questions = 0;
        foreach ($groups as $group) {
            $questions += count($group) - 1;
        }

        $this->assertEquals(6714, $questions);
    }

    public function testTotalSampleQuestionsForAll(): void
    {
        $service = new CustomCustoms();
        $groups = $service->parseSample();

        $questions = 0;
        foreach ($groups as $group) {
            $questions += $service->countAllQuestionsInGroup($group);
        }

        $this->assertEquals(6, $questions);
    }

    /**
     * @return Generator<array<int, int>>
     */
    public function groupsProvider(): Generator
    {
        yield [0, 7];
        yield [1, 1];
        yield [7, 4];
        yield [14, 2];
        yield [497, 4];
    }

    /**
     * @dataProvider groupsProvider
     * @param int $group
     * @param int $expected
     */
    public function testCountAllQuestionsInGroup(int $group, int $expected): void
    {
        $service = new CustomCustoms();
        $groups = $service->parseInput();

        $this->assertEquals($expected, $service->countAllQuestionsInGroup($groups[$group]));
    }

    public function testTotalInputQuestionsForAll(): void
    {
        $service = new CustomCustoms();
        $groups = $service->parseInput();

        $questions = 0;
        foreach ($groups as $group) {
            $questions += $service->countAllQuestionsInGroup($group);
        }

        $this->assertGreaterThan(57, $questions);
        $this->assertGreaterThan(3431, $questions);
        $this->assertEquals(3435, $questions);
    }
}
