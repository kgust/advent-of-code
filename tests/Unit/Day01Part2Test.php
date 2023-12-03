<?php

declare(strict_types=1);

use AdventOfCode\Day01\PartTwo;

it('sum of all values should be 281', function () {
    $value = PartTwo::sumAllValues([
        'two1nine',
        'eightwothree',
        'abcone2threexyz',
        'xtwone3four',
        '4nineeightseven2',
        'zoneight234',
        '7pqrstsixteen',
    ]);
    expect($value)->toBe(281);
});

it('sum of input values should equal 54078', function () {
    $value = PartTwo::sumAllValues(
        PartTwo::getInput()
    );
    expect($value)->toBe(54078);
});
