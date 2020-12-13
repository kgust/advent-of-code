<?php
declare(strict_types=1);
namespace Day\Eight;

use PHPUnit\Framework\TestCase;

class HandheldHaltingTest extends TestCase
{
    public $sample = <<<EOT
        nop +0
        acc +1
        jmp +4
        acc +3
        jmp -3
        acc -99
        acc +1
        jmp -4
        acc +6
        EOT;

    public function testParseSample()
    {
        $service = new HandheldHalting();
        $input = $service->parse($this->sample);
        $this->assertEquals(['nop', 0], $input[0]);
        $this->assertEquals(['jmp', -3], $input[4]);
    }

    public function testExecuteStep()
    {
        $service = new HandheldHalting();
        $service->parse($this->sample);

        for ($i = 0; $i < 7; $i++) {
            $service->executeStep();
        }

        $this->assertEquals(1, $service->getInstruction());
        $this->assertEquals(5, $service->getRegister());
    }

    public function testFindLoopPoint()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $service = new HandheldHalting();
        $service->parse($file);
        $result = $service->execute();

        $this->assertFalse($result);
        $this->assertEquals(2058, $service->getRegister());
    }

    public function testSwapInstruction()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $service = new HandheldHalting();
        $service->parse($file);
        $this->assertEquals('jmp', $service->input[4][0]);

        $service->swapInstruction(4);
        $this->assertEquals('nop', $service->input[4][0]);

        $service->swapInstruction(4);
        $this->assertEquals('jmp', $service->input[4][0]);
    }

    public function testFixProgram()
    {
        $file = file_get_contents(__DIR__ . '/input');
        $service = new HandheldHalting();
        $service->parse($file);
        $instructions = array_filter(
            $service->input,
            function ($instruction, $value) {
                return $instruction[0] !== 'acc';
            },
            ARRAY_FILTER_USE_BOTH
        );

        foreach (array_keys($instructions) as $instruction) {
            $service->reset();
            $service->swapInstruction($instruction);
            $result = $service->execute();
            $service->swapInstruction($instruction);
            if ($result === true) {
                $this->assertLessThan(260996, $service->getRegister());
                $this->assertLessThan(260962, $service->getRegister());
                $this->assertEquals(1000, $service->getRegister());
                break;
            }
        }
    }
}
