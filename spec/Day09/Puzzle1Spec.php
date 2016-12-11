<?php

namespace spec\Day09;

use Day09\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }

    /**
        Wandering around a secure area, you come across a datalink port to
        a new part of the network. After briefly scanning it for interesting
        files, you find one file in particular that catches your attention.
        It's compressed with an experimental format, but fortunately, the
        documentation for the format is nearby.

        The format compresses a sequence of characters. Whitespace is
        ignored. To indicate that some sequence should be repeated, a marker
        is added to the file, like (10x2). To decompress this marker, take
        the subsequent 10 characters and repeat them 2 times. Then, continue
        reading the file **after** the repeated data. The marker itself is not
        included in the decompressed output.

        If parentheses or other characters appear within the data referenced
        by a marker, that's okay - treat it like normal data, not a marker,
        and then resume looking for markers after the decompressed section.

        For example:

        ADVENT contains no markers and decompresses to itself with no
        changes, resulting in a decompressed length of 6.
        - A(1x5)BC repeats only the B a total of 5 times, becoming ABBBBBC
        for a decompressed length of 7.
        - (3x3)XYZ becomes XYZXYZXYZ for a decompressed length of 9.
        - A(2x2)BCD(2x2)EFG doubles the BC and EF, becoming ABCBCDEFEFG for
        a decompressed length of 11.
        - (6x1)(1x3)A simply becomes (1x3)A - the (1x3) looks like a marker,
        but because it's within a data section of another marker, it is not
        treated any differently from the A that comes after it. It has a
        decompressed length of 6.
        - X(8x2)(3x3)ABCY becomes X(3x3)ABC(3x3)ABCY (for a decompressed
        length of 18), because the decompressed data from the (8x2) marker
        (the (3x3)ABC) is skipped and not processed further.

        What is the **decompressed length** of the file (your puzzle input)? Don't count whitespace.
     */

    // This does not appear in the input!
    public function it_should_not_change_uncompressed()
    {
        $this->uncompress('ADVENT')->shouldReturn('ADVENT'); // 1
        $this->uncompress('(ADVENT)')->shouldReturn('(ADVENT)');
    }

    public function it_should_perform_simple_decompression()
    {
        $this->uncompress('A(1x5)BC')->shouldReturn('ABBBBBC'); // 2
        $this->uncompress('(3x3)XYZ')->shouldReturn('XYZXYZXYZ'); // 3
    }

    public function it_should_perform_multiple_decompression()
    {
        $this->uncompress('A(2x2)BCD(2x2)EFG')->shouldReturn('ABCBCDEFEFG'); // 4
    }

    public function it_should_not_decompress_double_markers()
    {
        // (6x1)(1x3)A simply becomes (1x3)A
        $this->uncompress('(6x1)(1x3)A')->shouldReturn('(1x3)A');
        // X(8x2)(3x3)ABCY becomes X(3x3)ABC(3x3)ABCY
        $this->uncompress('X(8x2)(3x3)ABCY')->shouldReturn('X(3x3)ABC(3x3)ABCY');
    }

    public function it_should_not_decompress_multiple_markers()
    {
        $this->uncompress('(6x1)(1x3)(12x2)(2x4)A')->shouldReturn('(1x3)(12x2)(2x4)A');
        $this->uncompress('(5x3)(1x3)(12x2)(2x4)A')->shouldReturn('(1x3)(1x3)(1x3)(12x2)(2x4)A');
        $this->uncompress('(5x3)(1x3)(12x2)(2x4)(7x3)A')->shouldReturn('(1x3)(1x3)(1x3)(12x2)(2x4)(7x3)A');
        $this->uncompress('(5x4)(1x3)(12x2)(2x4)(7x3)A')->shouldReturn('(1x3)(1x3)(1x3)(1x3)(12x2)(2x4)(7x3)A');
        $this->uncompress('(4x4)(1x3)(12x2)(2x4)(7x3)A')->shouldReturn('(1x3(1x3(1x3(1x3)(12x2)(2x4)(7x3)A');
    }

    public function it_should_come_up_with_an_answer() {
        $input = file_get_contents(__DIR__ . '/../../src/Day09/input.txt');
        $this->__invoke($input)->shouldNotEqual(29436); // too low
        $this->__invoke($input)->shouldNotEqual(32751); // too low

    }
}
