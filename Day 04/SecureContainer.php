<?php
namespace Day04;

class SecureContainer
{
    public function howManyValid(int $min, int $max): int
    {
        $validNumbers = 0;

        // brute force – needs optimizing
        for ($number=$min; $number<=$max; $number++) {
            if ($this->isValid($number)) {
                $validNumbers++;
            }
        }

        return $validNumbers;
    }

    public function howManyValid2(int $min, int $max): int
    {
        $validNumbers = 0;

        // brute force – needs optimizing
        for ($number=$min; $number<=$max; $number++) {
            if ($this->isValid2($number)) {
                echo $number . "\n";
                $validNumbers++;
            }
        }

        return $validNumbers;
    }

    private function isValid($number): bool
    {
        return $this->adjacentNumbersMatch($number) && $this->digitsNeverDecrease($number);
    }

    private function isValid2($number): bool
    {

        return $this->adjacentNumbersMatch2($number) && $this->digitsNeverDecrease($number);
    }

    private function adjacentNumbersMatch(int $number): bool
    {
        $digits = (string) $number;

        foreach (range(0, 4) as $index) {
            if ($digits[$index] === $digits[$index + 1]) return true;
        }

        return false;
    }

    public function adjacentNumbersMatch2(int $number): bool
    {
        $digits = ' ' . (string) $number . ' ';

        foreach (range(1, 5) as $index) {
            if ($digits[$index] === $digits[$index + 1] && $digits[$index] !== $digits[$index - 1] && $digits[$index] !== $digits[$index + 2]) {
                return true;
            }
        }

        return false;
    }

    private function digitsNeverDecrease(int $number): bool
    {
        $digits = (string) $number;

        foreach (range(0, 4) as $index) {
            if ($digits[$index] > $digits[$index + 1]) {
                return false;
            }
        }

        return true;
    }
}