<?php

namespace spec\Day7;

use Day7\Puzzle2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle2Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle2::class);
    }

    /**
     * You would also like to know which IPs support SSL (super-secret listening).
     *
     *  An IP supports SSL if it has an Area-Broadcast Accessor, or ABA,
     *  anywhere in the supernet sequences (outside any square bracketed
     *  sections), and a corresponding Byte Allocation Block, or BAB,
     *  anywhere in the hypernet sequences. An ABA is any three-character
     *  sequence which consists of the same character twice with a different
     *  character between them, such as xyx or aba. A corresponding BAB is
     *  the same characters but in reversed positions: yxy and bab,
     *  respectively.
     *
     *  For example:
     *
     *  aba[bab]xyz supports SSL (aba outside square brackets with corresponding bab within square brackets).
     *  xyx[xyx]xyx does not support SSL (xyx, but no corresponding yxy).
     *  aaa[kek]eke supports SSL (eke in supernet with corresponding kek in hypernet; the aaa sequence is not related, because the interior character must be different).
     *  zazbz[bzb]cdb supports SSL (zaz has no corresponding aza, but zbz has a corresponding bzb, even though zaz and zbz overlap).
     *
     *  How many IPs in your puzzle input support SSL?
     */

    public function it_finds_all_aba()
    {
        $this->findAllABA(['aba', 'bab', 'xyz'])->shouldBe(['aba']);
        $this->findAllABA(['xyx', 'xyx', 'xyz'])->shouldBe(['xyx']);
        $this->findAllABA(['aaa', 'kek', 'eke'])->shouldBe(['eke']);
        $this->findAllABA(['zazbz', 'bzb', 'cdb'])->shouldBe(['zaz', 'zbz']);
    }

    public function it_supports_ssl()
    {
        $this->supportsSSL(['aba', 'bab', 'xyz'])->shouldBe(true);
        $this->supportsSSL(['xyx', 'xyx', 'xyz'])->shouldBe(false);
        $this->supportsSSL(['aaa', 'kek', 'eke'])->shouldBe(true);
        $this->supportsSSL(['zazbz', 'bzb', 'cdb'])->shouldBe(true);

    }

    public function it_parses_a_line()
    {
        $this->parse('abba[mnop]qrst')->shouldReturn(['abba', 'mnop', 'qrst']);
        $this->parse('abcd[bddb]xyyx')->shouldReturn(['abcd', 'bddb', 'xyyx']);
        $this->parse('aaaa[qwer]tyui')->shouldReturn(['aaaa', 'qwer', 'tyui']);
        $this->parse('ioxxoj[gasdfgh]zxcvbn')->shouldReturn(['ioxxoj', 'gasdfgh', 'zxcvbn']);
        $this->parse('ffjhdorivdezjdb[tqkfrzxthlxadqstmqe]ttmrscyvbrresartqnh[rfztsxgbedcdecgv]qxcsxdqhshsqtjtl')
            ->shouldReturn(['ffjhdorivdezjdb', 'tqkfrzxthlxadqstmqe', 'ttmrscyvbrresartqnh', 'rfztsxgbedcdecgv', 'qxcsxdqhshsqtjtl']);
    }

    public function it_returns_an_answer()
    {
        $input = file_get_contents(__DIR__ . '/../../src/Day7/input.txt');

        $this->__invoke($input)->shouldNotEqual(69); // too low
        $this->__invoke($input)->shouldEqual(258);
    }
}
