<?php

namespace Day07;

class Puzzle2
{
    public function __invoke($input)
    {
        $validAddresses = 0;

        $addresses = explode("\n", $input);
        foreach ($addresses as $address) {
            $values = $this->parse($address);
            if ($this->supportsSSL($values)) {
                $validAddresses++;
            }
        }

        return $validAddresses;
    }

    public function parse($string)
    {
        return preg_split('/[\[\]]{1}/', $string);
    }

    public function findAllABA($input)
    {
        $abaFound = [];

        foreach ($input as $index => $string) {
            if ($index % 2) { continue; }

            for ($i=0; $i<(strlen($string) - 2); $i++) {
                if ($string[$i] === $string[$i+2]) {
                    if ($string[$i] !== $string[$i+1]) {
                        $abaFound[] = substr($string, $i, 3); // found an ABA
                    }
                }
            }
        }
        return $abaFound;
    }

    public function supportsSSL($input)
    {
        // Identify ABA patterns
        $allABA = $this->findAllABA($input);

        // Test the BAB patterns against hypernets
        foreach($allABA as $aba) {
            $bab = $aba[1].$aba[0].$aba[1];
            foreach ($input as $index => $string) {
                if ($index % 2 === 0) continue;
                if (strpos($string, $bab) !== false) {
                    return true;
                }
            }
        }

        return false;
    }
}
