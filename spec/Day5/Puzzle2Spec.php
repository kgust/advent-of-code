<?php

namespace spec\Day5;

use Day5\Puzzle2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle2::class);
    }

    public function it_can_calculate_password_from_example_doorid()
    {
        $this->calculatePassword('abc')
            ->shouldReturn('05ace8e3');
    }
}
