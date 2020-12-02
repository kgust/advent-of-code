<?php

namespace Test;

use Day02\Intcode;
use PHPUnit\Framework\TestCase;

class Day02Test extends TestCase
{
    public function testInput()
    {
        $intcode = new Intcode(__DIR__ . '/../Day 02/input.txt');
        $this->assertSame(13, $intcode->getInput()[18]);
    }

    public function testRun()
    {
        $intcode = new Intcode(__DIR__ . '/../Day 02/input.txt');
        $this->assertEquals(682644, $intcode->run()[0]);

        $intcode = new Intcode(__DIR__ . '/../Day 02/input.txt');
        $input = $intcode->getInput();
        $input[1] = 12;
        $input[2] = 2;
        $intcode->setInput($input);
        $this->assertEquals(7594646, $intcode->run()[0]);
    }

    public function testFindNounVerb()
    {
        $intcode = new Intcode(__DIR__ . '/../Day 02/input.txt');
        $this->assertSame(3376, $intcode->findAnswer());
    }

    /**
     * @dataProvider exampleProvider
     */
    public function testExamples(array $input, array $expected)
    {
        $intcode = new Intcode(__DIR__ . '/../Day 02/input.txt');
        $intcode->setInput($input);
        $intcode->run();
        $this->assertEquals($expected, $intcode->run());
    }

    public function exampleProvider()
    {
        return [
            [ [1,0,0,0,99], [2,0,0,0,99] ],
            [ [2,3,0,3,99], [2,3,0,6,99] ],
            [ [2,4,4,5,99,0], [2,4,4,5,99,9801] ],
            [ [1,1,1,4,99,5,6,0,99], [30,1,1,4,2,5,6,0,99] ],
        ];
    }
}
