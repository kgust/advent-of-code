<?php

namespace Day9;

class Puzzle1
{
    public function __invoke($input)
    {
        $matches = $this->parse($input);
        echo implode('', $matches)."\n";
        echo preg_match_all('/[\w]/', implode('', $matches))."\n";
        $matches = preg_split('/\(/', $input);
        return strlen(implode('', $matches));
    }

    public function parse($input)
    {
        $results = [];
        $matches = preg_split('/\(/', $input);

        for ($index=0; $index<count($matches); $index++) {
            if ($index === 0 && !empty($matches[$index])) {
                $results[] = $matches[$index];
                continue;
            } else if (preg_match('/^[^0-9]+\)$/', $matches[$index])) {
                $results[] = '('.$matches[$index];
            } else if (preg_match('/\d+x\d\)/', $matches[$index])) {
                list($count, $repeat, $subject) = preg_split('/[x\)]{1}/', $matches[$index]);
                if (!$subject) {
                    list($index, $subject) = $this->addSubject(++$index, $matches);
                } else {
                    echo 'single '.json_encode([$count, $repeat, $subject])."\n";
                }
                $orig = substr($subject, 0, $count);
                $results[] = str_repeat($orig, $repeat).substr($subject, $count);
            }
        }
        //echo json_encode($matches)."|";
        //echo json_encode($results)."\n";
        return $results;
    }

    public function uncompress($input)
    {
        return implode('', $this->parse($input));
        if (!preg_match('/[\(\)]/', $segment)) {
            return $segment;
        } else if (preg_match('/\(\d+x\d\)\(\d+x\d\)/', $segment)) {
        } else if (preg_match('/\(\d+x\d\)/', $segment)) {
            $chunks = preg_split('/[\(\)]{1}/', $segment);
            foreach ($chunks as $index => $chunk) {
                $count = $repeat = 0;
                if (sscanf($chunk, '%dx%d', $count, $repeat) === 2) {
                    $orig = substr($chunks[$index+1], 0, $count);
                    $chunks[$index+1] = str_repeat($orig, $repeat).substr($chunks[$index+1], $count);
                    unset($chunks[$index]);
                }
            }
            //var_dump($chunks);
            return implode('', $chunks);
        }
    }

    /**
     * @param $index
     * @param $matches
     *
     * @return array
     */
    public function addSubject($index, $matches, $subject='')
    {
        $subject .= '('.$matches[$index];

        if (substr($subject, -1) === ')') {
            // not the whole subject
            list($index, $subject) = $this->addSubject(++$index, $matches, $subject);
        }

        //echo 'double '.json_encode([$count, $repeat, $subject])."\n";
        return [$index, $subject];
    }
}
