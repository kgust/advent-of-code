<?php

declare(strict_types=1);

namespace Day\Five;

use Generator;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * @dataProvider sample
     * @param string $bspId Binary Space Partitioning
     * @param int $row
     * @param int $column
     * @param int $seat
     */
    public function testSeatParsing(string $bspId, int $row, int $column, int $seat): void
    {
        $boardingPass = new BoardingPass($bspId);

        $this->assertEquals($seat, $boardingPass->seat);
        $this->assertEquals($row, $boardingPass->row);
        $this->assertEquals($column, $boardingPass->column);
    }

    public function sample(): Generator
    {
        yield ['BFFFBBFRRR', 70, 7, 567];
        yield ['FFFBBBFRRR', 14, 7, 119];
        yield ['BBFFBBFRLL', 102, 4, 820];
    }

    public function testFindHighestSeatId()
    {
        $input = explode("\n", file_get_contents(__DIR__ . '/input'));
        $seats = array_map(
            function ($line) {
                $boardingPass = new BoardingPass($line);
                return $boardingPass->seat;
            },
            $input
        );

        rsort($seats);

        $this->assertEquals(947, current($seats));
    }

    public function testFindMissingSeats()
    {
        $input = explode("\n", file_get_contents(__DIR__ . '/input'));
        $seats = array_map(
            function ($line) {
                $boardingPass = new BoardingPass($line);
                return $boardingPass->seat;
            },
            $input
        );

        sort($seats);

        $missingSeats = array_diff(range(0, 947), $seats);
        $this->assertContains(636, $missingSeats);
    }
}
