<?php

$handle = fopen('input', 'r');

$values = [];

while ($row = fscanf($handle, "%d-%d %1s: %s\n")) {
    $values[] = $row;
}

fclose($handle);

return $values;
