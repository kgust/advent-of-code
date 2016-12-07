<?php

class Day1
{
    public static function howFarAway($input)
    {
        $position = [0, 0, 0];
        $locations = [];

        foreach (explode(', ', $input) as $step) {
            $distance = (int) substr($step, 1);

            if ($step[0] == 'R') {
                $position[2] += 90;
                if ($position[2] > 359) {
                    $position[2] -= 360;
                }
            } else {
                $position[2] -= 90;
                if ($position[2] < 0) {
                    $position[2] += 360;
                }
            }

            if ($position[2] === 0) {
                $position[0] += $distance;
            } else if ($position[2] === 90) {
                $position[1] += $distance;
            } else if ($position[2] === 180) {
                $position[0] -= $distance;
            } else {
                $position[1] -= $distance;
            }

            if (in_array("$position[0],$position[1]", $locations)) {
                echo $step.": ".json_encode([$position[1], $position[0], $position[2]])."\n";
                //break;
            } else {
                $locations[] = "$position[0],$position[1]";
            }
        }

        echo json_encode($position)."\n";
        return abs($position[0]) + abs($position[1])."\n";
    }
}

echo Day1::howFarAway('R2, L3'); // should equal 5
echo Day1::howFarAway('R2, R2, R2'); // should equal 2
echo Day1::howFarAway('R5, R5, R5, R5'); // should equal 0
echo Day1::howFarAway('R5, L5, R5, R3'); // should equal 12
echo Day1::howFarAway('R1, L3, R5, R5, R5, L4, R5, R1, R2, L1, L1, R5, R1, L3, L5, L2, R4, L1, R4, R5, L3, R5, L1, R3, L5, R1, L2, R1, L5, L1, R1, R4, R1, L1, L3, R3, R5, L3, R4, L4, R5, L5, L1, L2, R4, R3, R3, L185, R3, R4, L5, L4, R48, R1, R2, L1, R1, L4, L4, R77, R5, L2, R192, R2, R5, L4, L5, L3, R2, L4, R1, L5, R5, R4, R1, R2, L3, R4, R4, L2, L4, L3, R5, R4, L2, L1, L3, R1, R5, R5, R2, L5, L2, L3, L4, R2, R1, L4, L1, R1, R5, R3, R3, R4, L1, L4, R1, L2, R3, L3, L2, L1, L2, L2, L1, L2, R3, R1, L4, R1, L1, L4, R1, L2, L5, R3, L5, L2, L2, L3, R1, L4, R1, R1, R2, L1, L4, L4, R2, R2, R2, R2, R5, R1, L1, L4, L5, R2, R4, L3, L5, R2, R3, L4, L1, R2, R3, R5, L2, L3, R3, R1, R3');
