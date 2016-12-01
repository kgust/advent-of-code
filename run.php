<?php
require __DIR__ . '/vendor/autoload.php';

if (!isset($argv[1]) || !isset($argv[2])) {
    die('Usage: php run.php [day] [puzzle]' . PHP_EOL);
}

$day = preg_replace('/[^0-9]/', '', $argv[1]);
$puzzle = preg_replace('/[^0-9]/', '', $argv[2]);

$className = "Day{$day}\\Puzzle{$puzzle}";
$puzzleClass = new $className;
$input = file_get_contents(__DIR__ . '/src/Day' . $day . '/input.txt');
$answer = $puzzleClass($input);

echo $answer . PHP_EOL;