<?php

namespace Day05;

class Puzzle2
{
    public function __invoke($doorId)
    {
        return $this->calculatePassword($doorId);
    }

    /**
     * @param $doorId
     *
     * @return string
     */

    public function calculatePassword($doorId)
    {
        $password = [];

        for ($counter = 0; ; $counter++) {
            $hash = $this->hash($doorId, $counter);

            if (strpos($hash, '00000') === 0) {
                $position = $hash[5];
                $positionInvalid = (!is_numeric($position) || ($position < 0 || $position > 7));
                $positionUsed = array_key_exists($position, $password);

                if ($positionInvalid || $positionUsed) {
                    continue;
                }

                $password[$position] = $hash[6];
            }

            if (count($password) === 8) {
                break;
            }
        }

        ksort($password);

        return implode('', $password);
    }

    public function hash($doorId, $count)
    {
        return md5($doorId . (string) $count);
    }
}
