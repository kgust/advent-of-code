<?php

namespace Day02;

class Intcode
{
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

    public function run(): array
    {
        $opcode = $this->input[$this->position];

        if ($opcode === 99) {
            return $this->input;
        }

        $input1 = $this->input[$this->position + 1];
        $input2 = $this->input[$this->position + 2];
        $output = $this->input[$this->position + 3];

        switch ($opcode) {
            case 1: // sum
                $this->input[$output] = $this->input[$input1] + $this->input[$input2];
                $this->position += 4;
                break;
            case 2: // multiply
                $this->input[$output] = $this->input[$input1] * $this->input[$input2];
                $this->position += 4;
                break;
            case 99:
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