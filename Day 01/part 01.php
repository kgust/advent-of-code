<?php

$input = file_get_contents('input.txt');
$totalMass = 0;

foreach (explode("\n", $input) as $line) {
    if ($line === '') continue;
    echo $line . ': ';
    $mass = (float) $line / 3;
    $mass = (int) $mass;
    $mass = $mass - 2;
    $totalMass += $mass;
    echo $mass . "\n";
}

echo 'Total Mass: ' . $totalMass . "\n";
