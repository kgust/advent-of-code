<?php
declare(strict_types=1);
namespace Day\Seven;

use Day\Four\Passport;

class HandyHaversacks
{
    private array $bags;

    public function parse(string $input): array
    {
        $input = trim($input);
        $input = explode("\n", $input);

        $bags = [];

        foreach ($input as $index => $line) {
            [$bagType, $bagsInside] = $this->parseLine($line);
            $bags[$bagType] = $bagsInside;
        }

        $this->bags = $bags;

        return $bags;
    }

    public function parseLine(string $input): array
    {
        [$type, $contains] = explode(' bags contain ', $input);

        if ($contains === 'no other bags.') {
            return [$type, []];
        }

        $contains = explode(', ', $contains);

        $inside = [];
        foreach ($contains as $bag) {
            $values = explode(' ', $bag);
            $inside[$values[1] . ' ' . $values[2]] = (int) $values[0];
        }

        return [$type, $inside];
    }

    public function findPossibleBags()
    {
        $possibleBags = [];

        foreach ($this->bags as $bagName => $bag) {
            if ($this->containsShinyGoldBag($bagName)) {
                $possibleBags[$bagName] = $bag;
            }
        }

        return $possibleBags;
    }

    public function containsShinyGoldBag($bagName): bool
    {
        $bag = $this->bags[$bagName];

        if (array_key_exists('shiny gold', $bag)) {
            return true;
        }

        foreach ($bag as $insideBag => $count) {
            if ($this->containsShinyGoldBag($insideBag)) {
                return true;
            }
        }

        return false;
    }

    public function countInsideBags($bagName): int
    {
        $bag = $this->bags[$bagName];
        $countBags = 0;

        if (count($bag) === 0) {
            return 0;
        }

        foreach ($bag as $insideBag => $count) {
            $countBags += $this->countInsideBags($insideBag) * $count;
            $countBags += $count;
        }

        return $countBags;
    }
}
