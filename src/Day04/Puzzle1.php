<?php

namespace Day04;

class Puzzle1
{
    public function __invoke($input)
    {
        // 16274 = too low / 278221
        $sectorIdSum = 0;

        $roomStrings = explode("\n", $input);
        foreach ($roomStrings as $roomString) {
            if ($this->isReal($roomString)) {
                $breakdown = $this->breakdown($roomString);
                $sectorIdSum += $breakdown['sectorId'];
            }
        }

        return $sectorIdSum;
    }

    /**
     * @param $roomString
     *
     * @throws \InvalidArgumentException
     * @return array
     */
    public function breakdown($roomString)
    {
        $breakdown = [];

        if (! $this->isValidRoomString($roomString)) {
            throw new \InvalidArgumentException('Room string is invalid: ' . $roomString);
        }

        $result = preg_match('/^(?<name>[a-z0-9\-]{2,60})\-(?<sectorId>[0-9]{3})\[(?<checksum>[a-z]{5})\]$/', $roomString, $matches);

        if (empty($result)) {
            throw new \InvalidArgumentException('Parsing room string failed: ' . $roomString);
        }

        $breakdown['name'] = $matches['name'];
        $breakdown['sectorId'] = (int) $matches['sectorId'];
        $breakdown['checksum'] = $matches['checksum'];

        return $breakdown;
    }

    public function isValidRoomString($roomString)
    {
        return !! preg_match('/^[a-z0-9\-]{2,60}\-[0-9]{3}\[[a-z]{5}\]$/', $roomString);
    }

    public function isReal($roomString)
    {
        try {
            $breakdown = $this->breakdown($roomString);
        } catch (\InvalidArgumentException $e) {
            return false;
        }

        $generatedChecksum = '';

        $breakdown['name'] = str_replace('-', '', $breakdown['name']);
        $chars = count_chars($breakdown['name'], 1);
        $data = [];
        $ascii = [];
        $frequency = [];

        foreach ($chars as $decimal => $count) {
            $data[] = [
                'ascii' => $decimal,
                'frequency' => $count
            ];
        }

        // Obtain a list of columns
        foreach ($data as $key => $row) {
            $ascii[$key] = $row['ascii'];
            $frequency[$key] = $row['frequency'];
        }

        array_multisort($frequency, SORT_DESC, $ascii, SORT_ASC, $data);

        foreach ($data as $row) {
            $generatedChecksum .= chr($row['ascii']);
            if (strlen($generatedChecksum) == 5) {
                break;
            }
        }
        return $generatedChecksum === $breakdown['checksum'];
    }
}
