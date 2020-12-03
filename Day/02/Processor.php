<?php
namespace Day\Two;

class Processor
{
    public function findSledRentalValidPasswords(array $input): array
    {
        $validPasswords = [];

        foreach ($input as $index => $password) {
            preg_match_all("/{$password[2]}/",$password[3], $matches);

            $numberOfMatches = count($matches[0]);

            if ($numberOfMatches >= $password[0] && $numberOfMatches <= $password[1]) {
                $validPasswords[$index] = $password;
            }
        }

        return $validPasswords;
    }

    public function findTobogganValidPasswords(array $input): array
    {
        $validPasswords = [];

        foreach ($input as $index => $values) {
            $index1 = $values[0] - 1;
            $index2 = $values[1] - 1;
            $character = $values[2];
            $password = $values[3];

            $matches = 0;
            if ($password[$index1] === $character) $matches++;
            if ($password[$index2] === $character) $matches++;

            if ($matches === 1) {
                $validPasswords[$index] = $values;
            }
        }

        return $validPasswords;
    }
}
