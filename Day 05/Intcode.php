<?php

namespace Day02;

class Intcode
{
    CONST OP_SUM = 1;
    CONST OP_MULT = 2;
    CONST OP_SAVE = 3;
    CONST OP_OUTPUT = 4;
    const OP_HALT = 99;

    private $input;
    private $position;

    public function __construct(string $filename)
    {
        $this->position = 0;
        $this->input = $this->parseInput($filename);
    }

    private function parseInput($filename): array
    {
        $lines = explode("\n", file_get_contents($filename));
        $values = explode(',', $lines[0]);

        return array_map(function (string $value) {
            return (int) $value;
        }, $values);
    }

    public function setInput(array $input): void
    {
        $this->input = $input;
    }

    public function getInput(): array
    {
        return $this->input;
    }

    public function run($input, $output): array
    {
        $opcode = $this->input[$this->position] % 100;

        if ($opcode === self::OP_HALT) {
            return $this->input;
        }

        $params = (int) $this->input[$this->position] / 100;
        $position0 = (int) ((string) $params)[2];
        $immediate = (int) ((string) $params)[1];
        $position1 = (int) ((string) $params)[0];

        $input1 = $this->input[$this->position + 1];
        $input2 = $this->input[$this->position + 2];
        $output = $this->input[$this->position + 3];

        switch ($opcode % 100) {
            case self::OP_SUM:
                $this->input[$output] = $this->input[$input1] + $this->input[$input2];
                $this->position += 4;
                break;
            case self::OP_MULT,
                $this->input[$output] = $this->input[$input1] * $this->input[$input2];
                $this->position += 4;
                break;
            case self::OP_SAVE,
                // Opcode 3 takes a single integer as input and saves it to the position given by its only parameter. For example, the instruction 3,50 would take an input value and store it at address 50.
                break;
            case self::OP_OUTPUT,
                // Opcode 4 outputs the value of its only parameter. For example, the instruction 4,50 would output the value at address 50.
                break;
            case self::OP_HALT:
                throw new \Exception('Why did I find a \'99\' down here?');
            default:
                throw new \Exception('Invalid Opcode');
        }


        return $this->run();
    }

    public function findAnswer(): int
    {
        $input = array_merge([], $this->getInput());

        foreach (range(0, 99) as $noun) {
            foreach (range(0, 99) as $verb) {
                $this->setInput($input);
                $this->input[1] = $noun;
                $this->input[2] = $verb;
                $this->position = 0;

                if ($this->run()[0] === 19690720) {
                    return 100 * $noun + $verb;
                }
            }
        }

        return -1; // the value was not found
    }
}