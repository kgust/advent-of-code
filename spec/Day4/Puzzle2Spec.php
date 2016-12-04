<?php

namespace spec\Day4;

use Day4\Puzzle2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle2::class);
    }

    public function it_can_rotate_a_char_provided_number_of_times()
    {
        $this
            ->rotate('a', 1)
            ->shouldReturn('b');
        $this
            ->rotate('a', 2)
            ->shouldReturn('c');

        $this
            ->rotate('a', 25)
            ->shouldReturn('z');
    }

    public function it_exceptions_on_rotate_with_more_than_one_character()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringRotate('a string of more than one character', 23);
    }

    public function it_exceptions_on_rotate_with_char_as_int()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringRotate(2, 'a');
    }

    public function it_can_decrypt_valid_room_string()
    {
        $this
            ->decrypt('qzmt-zixmtkozy-ivhz', 343)
            ->shouldReturn('very encrypted name');
    }

}
