<?php

namespace spec\Day3;

use Day3\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }

    public function it_knows_whether_a_triangle_is_possible_based_on_length()
    {
        $this
            ->isPossible([
                25,
                10,
                5
            ])
            ->shouldReturn(false);
    }

    public function it_throws_an_exception_with_invalid_number_of_lengths()
    {
        $this->shouldThrow('\Exception')->duringIsPossible([1, 2, 3, 4]);
    }
}
