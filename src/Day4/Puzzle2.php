<?php

namespace Day4;

class Puzzle2 extends Puzzle1
{
    public function __invoke($input)
    {
        $decryptedRoomNames = [];
        $roomStrings = explode("\n", $input);
        foreach ($roomStrings as $roomString) {
            if ($this->isReal($roomString)) {
                $breakdown = $this->breakdown($roomString);
                $decryptedRoomNames[] = $this->decrypt($breakdown['name'], $breakdown['sectorId']) . ' --- ' . $breakdown['sectorId'];
            }
        }
        sort($decryptedRoomNames);
        return implode(PHP_EOL, $decryptedRoomNames);
    }
    /**
     * @param string $name
     * @param int $sectorId
     *
     * @return string
     */
    public function decrypt($name, $sectorId)
    {
        $sectorId = (string) $sectorId;

        $decrypted = '';
        $chars = str_split($name);

        foreach ($chars as $char) {
            $decrypted .= $this->rotate($char, $sectorId);
        }

        return $decrypted;
    }

    /**
     * @param string $char - One char
     * @param int $rotateAmount
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function rotate($char, $rotateAmount)
    {
        if (strlen($char) > 1 || is_int($char)) {
            throw new \InvalidArgumentException('We don\'t play that ... here: ' . $char);
        }

        if ($char == '-') {
            return ' ';
        }

        $ascii = ord($char);
        for ($i = 0; $i < $rotateAmount; $i++) {
            $ascii++;
            if ($ascii > ord('z')) {
                $ascii = ord('a');
            }
        }

        return chr($ascii);
    }
}
