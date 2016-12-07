<?php

$input = file('day3.txt');
$lineCount = count($input);
$count = 0;

for ($i=0; $i<$lineCount; $i+=3) {
    list($s[0][0], $s[1][0], $s[2][0]) = sscanf($input[$i], '%d %d %d');
    list($s[0][1], $s[1][1], $s[2][1]) = sscanf($input[$i+1], '%d %d %d');
    list($s[0][2], $s[1][2], $s[2][2]) = sscanf($input[$i+2], '%d %d %d');

    sort($s[0]);
    sort($s[1]);
    sort($s[2]);

    $count += (int) (($s[0][0] + $s[0][1]) > $s[0][2]);
    $count += (int) (($s[1][0] + $s[1][1]) > $s[1][2]);
    $count += (int) (($s[2][0] + $s[2][1]) > $s[2][2]);
}

echo $count.' of '.count($input)." triangles are valid.\n";
