<?php

namespace Day8;

class Puzzle1
{
    public function __invoke($input)
    {
        $screen = new Screen(50,6);

        $instructions = explode("\n", $input);
        foreach ($instructions as $instruction) {
            if ($instruction === '') { continue; }
            $arguments = $this->parseInstruction($instruction);
            $command = array_shift($arguments);
            call_user_func_array([$screen, $command], $arguments);
        }

        echo $screen;

        return $screen->countLitPixels();
    }

    public function parseInstruction($instruction)
    {
        $command = explode(' ', $instruction)[0];

        if ($command === 'rect') {
            $results = sscanf($instruction, 'rect %dx%d');
            array_unshift($results, 'rect');
        } else if ($command === 'rotate') {
           $values = explode(' ', $instruction);
           $results = [
               $values[0],
               ucwords($values[1]),
               (int) explode('=', $values[2])[1],
               (int) $values[4],
           ];
        }

        return $results;
    }
}
