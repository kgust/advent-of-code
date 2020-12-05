<?php

$file = file_get_contents(__DIR__ . '/input');
$input = explode("\n", $file);

$values = [];

foreach ($input as $index => $line) {
    $length = strlen($line);
    $spots = [];
    for ($spot = 0; $spot < $length; $spot++) {
        $spots[$spot] = $line[$spot] === '#';
    }
    $values[$index] = $spots;
}

return $values;
