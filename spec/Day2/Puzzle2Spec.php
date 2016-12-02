<?php

namespace spec\Day2;

use Day2\Puzzle2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle2::class);
    }

    public function it_can_go_from_5_to_A()
    {
        $this
            ->followInstruction('R')
            ->followInstruction('D')
            ->followInstruction('D')
            ->getCurrentKey()
            ->shouldReturn('A');
    }

    public function it_can_follow_multiple_instructions()
    {
        $this
            ->followInstruction('R')
            ->followInstruction('R')
            ->followInstruction('R')
            ->followInstruction('D')
            ->followInstruction('D')
            ->followInstruction('L')
            ->followInstruction('U')
            ->getCurrentKey()
            ->shouldReturn('7');
    }

    public function it_can_parse_short_instruction_file()
    {
        $this
            ->parse("ULL\nRRDDD\nLURDL\nUUUUD")
            ->shouldReturn('5DB3');
    }
}
