<?php

declare(strict_types=1);

use AdventOfCode\Day01\AbstractPart;
use AdventOfCode\Day01\PartOne;

it('value of first line should be 12', function () {
    $value = PartOne::parseLine('1abc2');
    expect($value)->toBe(12);
});

it('value of second line should be 38', function () {
    $value = PartOne::parseLine('pqr3stu8vwx');
    expect($value)->toBe(38);
});

it('value of fourth line should be 77', function () {
    $value = PartOne::parseLine('treb7uchet');
    expect($value)->toBe(77);
});

it('sum of all values should be 142', function () {
    $value = PartOne::sumAllValues([
        '1abc2',
        'pqr3stu8vwx',
        'a1b2c3d4e5f',
        'treb7uchet',
    ]);
    expect($value)->toBe(142);
});

it('sum of input values should be 54601', function () {
    $value = PartOne::sumAllValues(
        AbstractPart::getInput()
    );
    expect($value)->toBe(54601);
});
