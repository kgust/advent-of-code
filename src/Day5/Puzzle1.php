<?php

namespace Day5;

class Puzzle1
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
        $password = '';

        for ($counter = 0; ; $counter++) {
            if ($counter % 50000 === 0) {
                echo ".";
            }

            $hash = $this->hash($doorId, $counter);

            if (strpos($hash, '00000') === 0) {
                $password .= $hash[5];
            }

            if (strlen($password) === 8) {
                break;
            }
        }

        return $password;
    }

    public function hash($doorId, $count)
    {
        return md5($doorId . (string) $count);
    }
}
