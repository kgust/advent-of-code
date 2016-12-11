<?php

namespace spec\Day9;

use Day9\Puzzle2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle2::class);
    }
}
