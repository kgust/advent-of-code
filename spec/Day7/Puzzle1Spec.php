<?php

namespace spec\Day7;

use Day7\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }

    /**
     *  While snooping around the local network of EBHQ, you compile a list
     *  of IP addresses (they're IPv7, of course; IPv6 is much too limited).
     *  You'd like to figure out which IPs support TLS (transport-layer
     *  snooping).

     *  An IP supports TLS if it has an Autonomous Bridge Bypass Annotation,
     *  or ABBA. An ABBA is any four-character sequence which consists of
     *  a pair of two different characters followed by the reverse of that
     *  pair, such as xyyx or abba. However, the IP also must not have an
     *  ABBA within any hypernet sequences, which are contained by square
     *  brackets.

     *  For example:

     *  abba[mnop]qrst supports TLS (abba outside square brackets).
     *  abcd[bddb]xyyx does not support TLS (bddb is within square brackets, even though xyyx is outside square brackets).
     *  aaaa[qwer]tyui does not support TLS (aaaa is invalid; the interior characters must be different).
     *  ioxxoj[asdfgh]zxcvbn supports TLS (oxxo is outside square brackets, even though it's within a larger string).

     *  How many IPs in your puzzle input support TLS?
     */

    public function it_is_valid_abba()
    {
        $this->isValidABBA('abba')->shouldBe(true);
        $this->isValidABBA('abcd')->shouldBe(false);
        $this->isValidABBA('aaaa')->shouldBe(false);
        $this->isValidABBA('ioxxoj')->shouldBe(true);
    }

    public function it_supports_tls()
    {
        $this->supportsTLS(['abba', 'mnop', 'qrst'])->shouldReturn(true);
        $this->supportsTLS(['abcd', 'bddb', 'xyyx'])->shouldReturn(false);
        $this->supportsTLS(['aaaa', 'qwer', 'tyui'])->shouldReturn(false);
        $this->supportsTLS(['ioxxoj', 'asdfgh', 'zxcvbn'])->shouldReturn(true);
        $this->supportsTLS([
            'ffjhdorivdezjdb',
            'tqkfrzxthlxadqstmqe',
            'ttmrscyvbrresartqnh',
            'rfztsxgbedcdecgv',
            'qxcsxdqshhsqtjtl',
        ])
            ->shouldReturn(true);
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
        $this->__invoke($input)->shouldEqual(105);
    }
}
