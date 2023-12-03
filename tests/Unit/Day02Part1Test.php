<?php

declare(strict_types=1);

use AdventOfCode\Day02\PartOne;

it('should parse the input', function () {
    $lines = PartOne::parseInput();
    expect($lines[0])->toBe([
        0 => [ 'green' => 7, 'red' => 14, 'blue' => 5 ],
        1 => [ 'red' => 8, 'green' => 4 ],
        2 =>  [ 'green' => 6, 'red' => 18, 'blue' => 9 ],
    ]);
    expect($lines[16])->toBe([
        0 => [ 'red' => 17, 'green' => 8 ],
        1 => [ 'blue' => 4, 'green' => 10, 'red' => 3 ],
        2 => [ 'red' => 8, 'green' => 5, 'blue' => 3 ],
        3 => [ 'green' => 12, 'red' => 3 ],
    ]);
});

it('should get sample valid ids', function () {
    $ids = PartOne::getValidGameIds([
        0 => [
            [ 'blue' => 3, 'red' => 4 ],
            [ 'red' => 1, 'green' => 2, 'blue' => 6 ],
            [ 'green' => 2 ],
        ],
        1 => [
            [ 'green' => 2, 'blue' => 1 ],
            [ 'green' => 3, 'blue' => 4, 'red' => 1 ],
            [ 'green' => 1, 'blue' => 1 ],
        ],
        2 =>  [
            [ 'green' => 8, 'red' => 20, 'blue' => 6 ],
            [ 'green' => 13, 'red' => 4, 'blue' => 5 ],
            [ 'green' => 5, 'red' => 1 ],
        ],
        3 =>  [
            [ 'green' => 1, 'red' => 3, 'blue' => 6 ],
            [ 'green' => 3, 'red' => 6 ],
            [ 'green' => 3, 'red' => 14, 'blue' => 15 ],
        ],
        4 =>  [
            [ 'green' => 3, 'red' => 6, 'blue' => 1 ],
            [ 'green' => 2, 'red' => 1, 'blue' => 2 ],
        ],
    ]);
    expect($ids)->toBe([ 1, 2, 5 ]);
});

it('should sum valid game ids', function () {
    $sum = PartOne::sumValidGames();
    expect($sum)->toBeLessThan(2242);
    expect($sum)->toBeGreaterThan(1448);
    expect($sum)->toBe(2101);
});
