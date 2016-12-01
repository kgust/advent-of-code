<?php

namespace spec\Day1;

use Day1\Puzzle2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle2::class);
    }

    // For example, if your instructions are R8, R4, R4, R8, the first location you visit twice is 4 blocks away, due East.
    public function it_can_find_the_first_location_visited_twice()
    {
        // Less than 131
        //      126
        // Higher than 119
        // This feels like an off by one error

        $this->parse('L1, L5')->shouldBe(6);
        $this->parse('R8, R4, R4, R8')->shouldBe(4);
        $this->parse('R2, R2, R2, R4')->shouldBe(1);
        $this->parse('L10, R6, R4, R8')->shouldBe(6);
    }
}
