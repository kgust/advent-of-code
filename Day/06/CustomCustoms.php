<?php

declare(strict_types=1);

namespace Day\Six;

class CustomCustoms
{
    /**
     * @return array<int, array<string, int<1, max>>>
     */
    public function parseSample(): array
    {
        $sample = <<<EOT
            abc

            a
            b
            c

            ab
            ac

            a
            a
            a
            a

            b
            EOT;

        return $this->parse($sample);
    }

    /**
     * @param string $filename
     * @return array<int, array<string, int<1, max>>>
     */
    public function parseInput(string $filename = __DIR__ . '/' . 'input'): array
    {
        $text = file_get_contents($filename);
        $text = trim($text);

        return $this->parse($text);
    }

    /**
     * @param string $text
     * @return array<int, array<string, int<1, max>>>
     */
    private function parse(string $text): array
    {
        $results = [];
        $groups = explode("\n\n", $text);

        foreach ($groups as $gindex => $group) {
            $records = explode("\n", $group);
            $results[$gindex]['total'] = count($records);

            foreach ($records as $rindex => $record) {
                for ($inc = 0; $inc < strlen($record); $inc++) {
                    if (isset($results[$gindex][$record[$inc]])) {
                        $results[$gindex][$record[$inc]]++;
                    } else {
                        $results[$gindex][$record[$inc]] = 1;
                    }
                }
            }
        }

        return $results;
    }

    public function countAllQuestionsInGroup(array $group): int
    {
        $questions = 0;
        $totalRecords = $group['total'];

        foreach ($group as $index => $question) {
            if ($index === 'total') {
                continue;
            }
            if ($question === $totalRecords) {
                $questions++;
            }
        }

        return $questions;
    }
}
