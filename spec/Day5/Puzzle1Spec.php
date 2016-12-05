<?php

namespace spec\Day5;

use Day5\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }

    /*
     * For example, if the Door ID is abc:

    The first index which produces a hash that starts with five zeroes is 3231929, which we find by hashing abc3231929; the sixth character of the hash, and thus the first character of the password, is 1.
    5017308 produces the next interesting hash, which starts with 000008f82..., so the second character of the password is 8.
    The third time a hash starts with five zeroes is for abc5278568, discovering the character f.
     */

    public function it_can_calculate_password_from_example_doorid()
    {
        $this->calculatePassword('abc')
            ->shouldReturn('18f47a30');
    }

    public function it_can_hash_doorid_and_count()
    {
        $this->hash('abc', 3231929)->shouldStartWith('00000');
    }
}
