<?php

namespace spec\Day03;

use Day03\Puzzle2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle2::class);
    }
}
