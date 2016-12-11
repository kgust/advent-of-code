<?php

namespace Day7;

class Puzzle1
{
    public function __invoke($input)
    {
        $validAddresses = 0;

        $addresses = explode("\n", $input);
        foreach ($addresses as $address) {
            $values = $this->parse($address);
            if ($this->supportsTLS($values)) {
                $validAddresses++;
            }
        }

        return $validAddresses;
    }

    public function isValidABBA($string)
    {
        for ($i=0; $i<(strlen($string) - 3); $i++) {
            if ($string[$i].$string[$i+1] === $string[$i+3].$string[$i+2]) {
                if ($string[$i] !== $string[$i+1]) {
                    return true; // found an ABBA
                }
            }
        }
        return false;
    }

    public function supportsTLS(array $input)
    {
        $valid = false;
        foreach ($input as $index => $value) {
            if ($index % 2) {
                if ($this->isValidABBA($value)) {
                    return false;
                }
            } else {
                if ($this->isValidABBA($value)) {
                    $valid = true;
                }
            }
        }

        return $valid;
    }

    public function parse($string)
    {
        return preg_split('/[\[\]]{1}/', $string);
    }
}
