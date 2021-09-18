<?php
declare(strict_types=1);

namespace Day\Eight;

use InvalidArgumentException;

class HandheldHalting
{
    public array $input;
    private int $instruction = 0;
    private int $register = 0;

    public function parse(string $input): array
    {
        $input = trim($input);
        $input = explode("\n", $input);
        $input = array_map(
            fn($line) => explode(' ', $line),
            $input
        );

        $this->input = $input;

        return $input;
    }

    public function execute(): ?bool
    {
        $executedInstructions = [];
        $programLength = count($this->input);

        while (true) {
            if (in_array($this->getInstruction(), $executedInstructions)) return false;
            if ($this->getInstruction() >= $programLength) return true;

            $executedInstructions[] = $this->getInstruction();
            $this->executeStep();
        }
    }

    public function executeStep(): array
    {
        [$operation, $value] = $this->input[$this->instruction];

        if (!is_string($operation)) {
            throw new InvalidArgumentException("Invalid operation: '{$operation}'.");
        }

        $this->{$operation}($value);

        return [$this->instruction, $operation, $value];
    }

    public function swapInstruction($instruction): void
    {
        $this->input[$instruction][0] = $this->input[$instruction][0] === 'jmp' ? 'nop' : 'jmp';
    }

    public function getInstruction(): int
    {
        return $this->instruction;
    }

    public function getRegister(): int
    {
        return $this->register;
    }

    public function reset(): void
    {
        $this->instruction = 0;
        $this->register = 0;
    }

    private function acc($value): void
    {
        $this->register += $value;
        $this->instruction++;
    }

    private function nop($value): void
    {
        $this->instruction++;
    }

    private function jmp($value): void
    {
        $this->instruction += $value;
    }
}
