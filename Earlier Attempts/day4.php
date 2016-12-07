<?php

$rooms = 0;
$sectorSum = 0;

$input = file('day4.txt');

//$input = [ 'aaaaa-bbb-z-y-x-123[abxyz]', 'a-b-c-d-e-f-g-h-987[abcde]', 'not-a-real-room-404[oarel]', 'totally-real-room-200[decoy]' ];

foreach ($input as $line) {
    $keywords = explode('-', $line);
    $value = array_pop($keywords);
    $name = implode('-', $keywords);

    list($sectorId, $checksum) = sscanf($value, "%d[%s");
    $checksum = substr($checksum, 0, -1);

    for ($i=0; $i<5; $i++) {
        if (!preg_match("/[{$checksum[$i]}]+/", $name)) {
            break;
        }
    }
    if ($i !== 5) {
        continue;
    }

    echo str_rot13($line);
    echo $line;
    $rooms++;
    $sectorSum += $sectorId;
}

echo "There are {$rooms} valid rooms and ".count($input)." total rooms.\n";
echo "The sector id sum is ".$sectorSum;
