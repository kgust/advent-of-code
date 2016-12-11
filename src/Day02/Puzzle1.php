<?php

namespace Day02;

class Puzzle1
{
    protected $currentKey = 5;
    private $keys = [];

    public function __invoke($instructions)
    {
        return $this->parse($instructions);
    }

    /**
     * @param string $instructions - separated by newlines: ULLL\nRRDDD
     *
     * @return int
     */
    public function parse($instructions)
    {
        $instructions = explode("\n", $instructions);

        foreach ($instructions as $instructionLine) {
            $instructions = str_split($instructionLine);
            // $instructions = ['U', 'L', 'L'];
            foreach ($instructions as $instruction) {
                // U, L, L
                $this->followInstruction($instruction);
            }

            $this->keys[] = $this->getCurrentKey();
        }

        return implode('', $this->keys);
    }

    public function setCurrentKey($key)
    {
        $this->currentKey = $key;

        return $this;
    }

    public function getCurrentKey()
    {
        return $this->currentKey;
    }

    public function followInstruction($instruction)
    {
        $instruction = strtoupper($instruction);

        switch ($instruction) {
            case 'U':
                $this->currentKey -= ($this->getCurrentKey() > 3) ? 3 : 0;
                break;

            case 'D':
                $this->currentKey += ($this->getCurrentKey() < 7) ? 3 : 0;
                break;

            case 'L':
                $this->currentKey -= (in_array($this->getCurrentKey(), [1, 4, 7])) ? 0 : 1;
                break;

            case 'R':
                $this->currentKey += (in_array($this->getCurrentKey(), [3, 6, 9])) ? 0 : 1;
                break;

            default:
                throw new \Exception('Invalid instruction/direction provided: ' . $instruction);
        }

        return $this;
    }
}
