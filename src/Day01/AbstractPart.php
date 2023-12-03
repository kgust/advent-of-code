<?php

declare(strict_types=1);

namespace AdventOfCode\Day01;

class AbstractPart
{

    /** @return array<string> */
    public static function getInput(): array
    {
        return file(__DIR__ . '/input.txt');
    }
}
