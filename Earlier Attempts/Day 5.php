<?php

$index = 0;

$doorId = 'uqwqemis';
//$doorId = 'abc';

$solution = [0,0,0,0,0,0,0,0];

for ($j=0; $j < 8; ) {
    while (true) {
        $hash = md5($doorId.$index++);
        if (substr_compare($hash, '00000', 0, 5) === 0) {
            $position = substr($hash, 5, 1);
            $character = substr($hash, 6, 1);
            if (preg_match('/^[0-7]$/', $position) && is_int($solution[$position])) {
                $solution[(int) $position] = $character;
                echo implode('', $solution).": ".$hash."\n";
                //echo json_encode($solution)."\n";
                $j++;
                break;
            }
        }
    }
}

echo implode('', $solution)."\n";
