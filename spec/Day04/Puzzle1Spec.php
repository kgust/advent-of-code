<?php

namespace spec\Day04;

use Day04\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }

    /*
A room is real (not a decoy) if the checksum is the five most common letters in the encrypted name, in order, with ties broken by alphabetization. For example:

aaaaa-bbb-z-y-x-123[abxyz] is a real room because the most common letters are a (5), b (3), and then a tie between x, y, and z, which are listed alphabetically.
a-b-c-d-e-f-g-h-987[abcde] is a real room because although the letters are all tied (1 of each), the first five are listed alphabetically.
not-a-real-room-404[oarel] is a real room.
totally-real-room-200[decoy] is not
     */

    public function it_knows_a_valid_room_string_is_valid()
    {
        $this
            ->isValidRoomString('aaaaa-bbb-z-y-x-123[abxyz]')
            ->shouldBe(true);
    }

    public function it_knows_a_decoy_room_string_is_valid()
    {
        $this
            ->isValidRoomString('totally-real-room-200[decoy]')
            ->shouldBe(true);
    }

    public function it_can_breakdown_a_valid_room_string()
    {
        $this
            ->breakdown('aaaaa-bbb-z-y-x-123[abxyz]')
            ->shouldReturn([
                'name' => 'aaaaa-bbb-z-y-x',
                'sectorId' => 123,
                'checksum' => 'abxyz',
            ]);
    }

    public function it_can_breakdown_a_decoy_room_string()
    {
        $this
            ->breakdown('totally-real-room-200[decoy]')
            ->shouldReturn([
                'name' => 'totally-real-room',
                'sectorId' => 200,
                'checksum' => 'decoy',
            ]);
    }

    public function it_throws_exception_with_invalid_room_string()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringBreakdown('This is a totally invalid room string, throw an exception please');
    }

    public function it_knows_a_real_room_is_real()
    {
        $this
            ->isReal('aaaaa-bbb-z-y-x-123[abxyz]')
            ->shouldBe(true);
    }

    public function it_knows_a_decoy_room_is_a_decoy()
    {
        $this
            ->isReal('totally-real-room-200[decoy]')
            ->shouldBe(false);
    }

    public function it_can_support_long_valid_strings()
    {
        $this
            ->isReal('xjinphzm-bmvyz-ojk-nzxmzo-ezggtwzvi-zibdizzmdib-577[zimbd]')
            ->shouldBe(true);
    }
}
