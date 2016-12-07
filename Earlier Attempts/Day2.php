<?php

$loc = [3,1];

$input = [
    'ULL',
    'RRDDD',
    'LURDL',
    'UUUUD',
];

$input = file('day2.txt');

foreach ($input as $line) {
    for ($i=0; $i<strlen($line); $i++) {
        $direction = $line[$i];

        if ($direction === 'U' and keypad($loc, -1) !== null) $loc[0] -= 1;
        if ($direction === 'D' and keypad($loc, 1) !== null) $loc[0] += 1;
        if ($direction === 'L' and keypad($loc, 0, -1) !== null) $loc[1] -= 1;
        if ($direction === 'R' and keypad($loc, 0, 1) !== null) $loc[1] += 1;
    }
    echo keypad($loc);
}
echo "\n";

function keypad($loc, $xoffset=0, $yoffset=0) {
    $keypad1 = [
        [1,2,3],
        [4,5,6],
        [7,8,9],
    ];

    $keypad2 = [
        [null, null, null, null, null, null, null],
        [null, null, null, 1,    null, null, null],
        [null, null, 2,    3,    4,    null, null],
        [null, 5,    6,    7,    8,    9,    null],
        [null, null, 'A',  'B',  'C',  null, null],
        [null, null, null, 'D',  null, null, null],
        [null, null, null, null, null, null, null],
    ];

    return $keypad2 [$loc[0]+$xoffset] [$loc[1]+$yoffset];
}
