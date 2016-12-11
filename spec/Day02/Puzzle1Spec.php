<?php

namespace spec\Day02;

use Day02\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }

    public function it_defaults_keypad_to_key_five()
    {
        $this->getCurrentKey()->shouldReturn(5);
    }

    public function it_can_go_up_from_five()
    {
        $this
            ->setCurrentKey(5)
            ->followInstruction('U')
            ->getCurrentKey()
            ->shouldReturn(2);

        $this
            ->setCurrentKey(5)
            ->followInstruction('U')
            ->followInstruction('U')
            ->getCurrentKey()
            ->shouldReturn(2);
    }

    public function it_can_go_down_from_five()
    {
        $this
            ->setCurrentKey(5)
            ->followInstruction('D')
            ->getCurrentKey()
            ->shouldReturn(8);

        $this
            ->setCurrentKey(5)
            ->followInstruction('D')
            ->followInstruction('D')
            ->getCurrentKey()
            ->shouldReturn(8);
    }

    public function it_can_go_right_from_valid_keys()
    {
        $this->setCurrentKey(1)
            ->followInstruction('R')
            ->getCurrentKey()
            ->shouldReturn(2);

        $this->setCurrentKey(1)
            ->followInstruction('R')
            ->followInstruction('R')
            ->followInstruction('R')
            ->getCurrentKey()
            ->shouldReturn(3);

        $this->setCurrentKey(7)
            ->followInstruction('R')
            ->getCurrentKey()
            ->shouldReturn(8);
    }

    public function it_cannot_go_right_from_invalid_keys()
    {
        $this->setCurrentKey(3)
            ->followInstruction('R')
            ->getCurrentKey()
            ->shouldReturn(3);
    }

    public function it_can_go_left_from_valid_keys()
    {
        $this->setCurrentKey(9)
            ->followInstruction('L')
            ->getCurrentKey()
            ->shouldReturn(8);

        $this->setCurrentKey(6)
            ->followInstruction('L')
            ->followInstruction('L')
            ->followInstruction('L')
            ->getCurrentKey()
            ->shouldReturn(4);
    }

    public function it_cannot_go_left_from_invalid_keys()
    {
        $this->setCurrentKey(4)
            ->followInstruction('L')
            ->getCurrentKey()
            ->shouldReturn(4);
    }

    public function it_can_parse_and_follow_multiple_instructions()
    {
        $this->setCurrentKey(5)
            ->parse("ULL\nRRDDD\nLURDL\nUUUUD")
            ->shouldReturn('1985');
    }
}
