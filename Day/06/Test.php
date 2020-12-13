<?php
declare(strict_types=1);
namespace Day\Six;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testParseSample()
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

    public function testTotalQuestionsForAnyone()
    {
        $service = new CustomCustoms();
        $groups = $service->parseInput();

        $questions = 0;
        foreach ($groups as $group) {
            $questions += count($group) - 1;
        }

        $this->assertEquals(6714, $questions);
    }

    public function testTotalSampleQuestionsForAll()
    {
        $service = new CustomCustoms();
        $groups = $service->parseSample();

        $questions = 0;
        foreach ($groups as $group) {
            $questions += $service->countAllQuestionsInGroup($group, $questions);
        }

        $this->assertEquals(6, $questions);
    }

    public function groupsProvider()
    {
        yield [0, 7];
        yield [1, 1];
        yield [7, 4];
        yield [14, 2];
        yield [497, 4];
    }

    /**
     * @dataProvider groupsProvider
     */
    public function testCountAllQuestionsInGroup($group, $expected)
    {
        $service = new CustomCustoms();
        $groups = $service->parseInput();

        $this->assertEquals($expected, $service->countAllQuestionsInGroup($groups[$group]));
    }

    public function testTotalInputQuestionsForAll()
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
