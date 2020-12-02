<?php
namespace Day01;

class CalculateFuel
{
    /**
     * @var array
     */
    private $input;

    public function __construct(string $fileName)
    {
        $this->input = explode("\n", file_get_contents($fileName));
    }

    public function calculateFuelRequirement(int $mass, bool $recursive = false) : int
    {
        $fuelForMass = (float) $mass / 3;
        $fuelForMass = (int) $fuelForMass;
        $fuelForMass = $fuelForMass - 2;

        if ($fuelForMass <= 0) {
            $fuelForMass = 0;
        }

        if ($recursive && $fuelForMass !== 0) {
            return $fuelForMass + $this->calculateFuelRequirement($fuelForMass, true);
        }

        return $fuelForMass;
    }

    public function getPartTwoTotal()
    {
        $totalFuelRequired = 0;

        foreach ($this->input as $moduleMass) {
            $totalFuelRequired += $this->calculateFuelRequirement((int) $moduleMass, true);
        }

        return $totalFuelRequired;
    }

    public function getPartOneTotal()
    {
        $totalFuelRequired = 0;

        foreach ($this->input as $moduleMass) {
            $totalFuelRequired += $this->calculateFuelRequirement((int) $moduleMass);
        }

        return $totalFuelRequired;
    }
}

//$input = file_get_contents('input.txt');
//$totalMass = 0;
//
//foreach (explode("\n", $input) as $line) {
//}
//
//echo 'Total Mass: ' . $totalMass . "\n";
