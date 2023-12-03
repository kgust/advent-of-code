<?php

declare(strict_types=1);

use AdventOfCode\Day02\PartTwo;

it('should parse the input', function () {
    $lines = PartTwo::parseInput();
    expect($lines[0])->toBe([
        0 => [
            'red' => 14,
            'green' => 7,
            'blue' => 5,
        ],
        1 => [
            'red' => 8,
            'green' => 4,
            'blue' => 0,
        ],
        2 => [
            'red' => 18,
            'green' => 6,
            'blue' => 9,
        ],
    ]);
    expect($lines[16])->toBe([
        0 => [
            'red' => 17,
            'green' => 8,
            'blue' => 0,
        ],
        1 => [
            'red' => 3,
            'green' => 10,
            'blue' => 4,
        ],
        2 => [
            'red' => 8,
            'green' => 5,
            'blue' => 3
        ],
        3 => [
            'red' => 3,
            'green' => 12,
            'blue' => 0,
        ],
    ]);
});

it('should calculate maximum cubes per game', function () {
    $maximumCubes = PartTwo::getMaximumCubesPerGame([
        0 => [
            'red' => 14,
            'green' => 7,
            'blue' => 5,
        ],
        1 => [
            'red' => 8,
            'green' => 4,
            'blue' => 0,
        ],
        2 => [
            'red' => 18,
            'green' => 6,
            'blue' => 9,
        ],
    ]);
    expect($maximumCubes)->toBe([
        'red' => 18,
        'green' => 7,
        'blue' => 9,
    ]);
});

it('should get sum of products', function () {
    $sum = PartTwo::getSumOfProducts([
        0 => [
            0 => [
                'red' => 14,
                'green' => 7,
                'blue' => 5,
            ],
            1 => [
                'red' => 8,
                'green' => 4,
                'blue' => 0,
            ],
            2 => [
                'red' => 18,
                'green' => 6,
                'blue' => 9,
            ],
        ],
        1 => [
            0 => [
                'red' => 17,
                'green' => 8,
                'blue' => 0,
            ],
            1 => [
                'red' => 3,
                'green' => 10,
                'blue' => 4,
            ],
            2 => [
                'red' => 8,
                'green' => 5,
                'blue' => 3
            ],
            3 => [
                'red' => 3,
                'green' => 12,
                'blue' => 0,
            ],
        ],
    ]);
    expect($sum)->toBe(1950);
});

it('should get sum of products for all games', function () {
    $sum = PartTwo::getSumOfProducts(PartTwo::parseInput());
    expect($sum)->toBe(58269);
});
