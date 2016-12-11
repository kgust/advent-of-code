<?php

namespace spec\Day8;

use Day8\Screen;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScreenSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Screen::class);
    }

    function it_should_create_a_blank_screen()
    {
        $this->beConstructedWith(3,2);
        $this->__toString()->shouldReturn("...\n...\n");
    }

    //rect 3x2 creates a small rectangle in the top-left corner:
    //    ###....
    //    ###....
    //    .......
    function it_should_create_rectangles()
    {
        //$s = new \Day8\Screen(10, 4);
        //var_dump($s->rect(3,2));
        $this->beConstructedWith(7, 3);
        $this->rect(3,2)->__toString()->shouldEqual(
            "###....\n".
            "###....\n".
            ".......\n"
        );
    }

    public function it_should_rotate()
    {
        $this->beConstructedWith(7, 3);
        $this->rect(3,2)->__toString()->shouldEqual(
            "###....\n".
            "###....\n".
            ".......\n"
        );

        //rotate column x=1 by 1 rotates the second column down by one pixel:
        // #.#....
        // ###....
        // .#.....
        $this->rotate('Column', 1, 1)->__toString()->shouldEqual(
            "#.#....\n".
            "###....\n".
            ".#.....\n"
        );

        //rotate row y=0 by 4 rotates the top row right by four pixels:
        // ....#.#
        // ###....
        // .#.....
        $this->rotate('Row', 0, 4)->__toString()->shouldEqual(
            "....#.#\n".
            "###....\n".
            ".#.....\n"
        );

        //rotate column x=1 by 1 again rotates the second column down by one pixel, causing the bottom pixel to wrap back to the top:
        // .#..#.#
        // #.#....
        // .#.....
        $this->rotate('Column', 1, 1)->__toString()->shouldEqual(
            ".#..#.#\n".
            "#.#....\n".
            ".#.....\n"
        );
    }

}
