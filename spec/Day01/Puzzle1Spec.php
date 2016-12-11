<?php
namespace spec\Day01;

use Day01\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }

    public function it_can_parse_an_individual_instruction_turning_right()
    {
        $this->parseInstruction('R3')->shouldBe([
            'turnDirection' => Puzzle1::TURN_DIRECTION_RIGHT,
            'walkDistance' => 3,
        ]);
    }

    public function it_can_parse_an_individual_instruction_turning_left()
    {
        $this->parseInstruction('L13')->shouldBe([
            'turnDirection' => Puzzle1::TURN_DIRECTION_LEFT,
            'walkDistance' => 13,
        ]);
    }

    // If we're facing north, and we turn right, we should face east
    // If we're facing south, and we turn right, we should face west

    public function it_knows_which_way_we_face_after_turning_right()
    {
        $this
            ->face(Puzzle1::DIRECTION_FACING_NORTH)
            ->turn(Puzzle1::TURN_DIRECTION_RIGHT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_EAST);

        $this
            ->face(Puzzle1::DIRECTION_FACING_EAST)
            ->turn(Puzzle1::TURN_DIRECTION_RIGHT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_SOUTH);

        $this
            ->face(Puzzle1::DIRECTION_FACING_SOUTH)
            ->turn(Puzzle1::TURN_DIRECTION_RIGHT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_WEST);

        $this
            ->face(Puzzle1::DIRECTION_FACING_WEST)
            ->turn(Puzzle1::TURN_DIRECTION_RIGHT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_NORTH);
    }

    public function it_knows_which_way_we_face_after_turning_left()
    {
        $this
            ->face(Puzzle1::DIRECTION_FACING_NORTH)
            ->turn(Puzzle1::TURN_DIRECTION_LEFT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_WEST);

        $this
            ->face(Puzzle1::DIRECTION_FACING_EAST)
            ->turn(Puzzle1::TURN_DIRECTION_LEFT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_NORTH);

        $this
            ->face(Puzzle1::DIRECTION_FACING_SOUTH)
            ->turn(Puzzle1::TURN_DIRECTION_LEFT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_EAST);

        $this
            ->face(Puzzle1::DIRECTION_FACING_WEST)
            ->turn(Puzzle1::TURN_DIRECTION_LEFT)
            ->facing()
            ->shouldReturn(Puzzle1::DIRECTION_FACING_SOUTH);
    }

    public function it_can_parse_an_individual_instruction_turning_left_with_triple_digits()
    {
        $this->parseInstruction('L153')->shouldBe([
            'turnDirection' => Puzzle1::TURN_DIRECTION_LEFT,
            'walkDistance' => 153,
        ]);
    }

    public function it_can_parse_basic_short_instructions()
    {
        // Following R2, L3 leaves you 2 blocks East and 3 blocks North, or 5 blocks away.
        $this->parse('R2, L3')->shouldReturn(5);

        $this->parse('L1, L5')->shouldReturn(6);

        //R2 (east 2), R2 (south 2), R2 (west 2) leaves you 2 blocks due South of your starting position, which is 2 blocks away.
        $this->parse('R2, R2, R2')->shouldReturn(2);

        // R5, L5, R5, R3 leaves you 12 blocks away.
        $this->parse('R5, L5, R5, R3')->shouldReturn(12);
    }
}
