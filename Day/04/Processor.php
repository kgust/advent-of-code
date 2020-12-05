<?php
declare(strict_types=1);
namespace Day\Four;

use Error;

class Processor
{
    public function parseFile(string $filename): array
    {
        $file = file_get_contents($filename);
        $input = explode("\n\n", $file);
        $passports = [];

        foreach ($input as $index => $record) {
            $recordValues = explode(' ', strtr($record, "\n", ' '));

            $passport = new Passport();
            foreach ($recordValues as $recordValue) {
                [$property, $value] = explode(':', $recordValue);
                $passport->set($property, $value);
            }

            $passports[$index] = $passport;
        }

        return $passports;
    }

    /**
     * @param array<Passport> $passports
     * @return array<Passport>
     */
    public function getCompletePassports(array $passports): array
    {
        $completePassports = [];

        foreach ($passports as $passport) {
            try {
                json_encode($passport);
                $completePassports[] = $passport;
            } catch (Error $error) {
                // nothing to see here
            }
        }

        return $completePassports;
    }

    /**
     * @param array<Passport> $passports
     * @return array<Passport>|null
     */
    public function getValidPassports(array $passports): ?array
    {
        $completePassports = $this->getCompletePassports($passports);

        foreach ($completePassports as $passport) {
            if ($this->isValid($passport)) {
                $validPassports[] = $passport;
            }
        }

        return $validPassports;
    }

    private function isValid(Passport $passport): bool
    {
        //byr (Birth Year) - four digits; at least 1920 and at most 2002.
        $birthYear = (int) $passport->getBirthYear();
        if ($birthYear < 1920 || $birthYear > 2002) {
            return false;
        }

        //iyr (Issue Year) - four digits; at least 2010 and at most 2020.
        $issueYear = (int) $passport->getIssueYear();
        if ($issueYear < 2010 || $issueYear > 2020) {
            return false;
        }

        //eyr (Expiration Year) - four digits; at least 2020 and at most 2030.
        $expirationYear = (int) $passport->getExpirationYear();
        if ($expirationYear < 2020 || $expirationYear > 2030) {
            return false;
        }

        //hgt (Height) - a number followed by either cm or in:
        $found = sscanf($passport->getHeight(), '%d%s', $number, $unit);
        if ($found !== 2 || !is_int($number) || !in_array($unit, ['cm', 'in'])) {
            return false;
        }

        //If cm, the number must be at least 150 and at most 193.
        if ($unit === 'cm' && ($number < 150 || $number > 193)) {
            return false;
        }

        //If in, the number must be at least 59 and at most 76.
        if ($unit === 'in' && ($number < 59 || $number > 76)) {
            return false;
        }

        //hcl (Hair Color) - a # followed by exactly six characters 0-9 or a-f.
        if (!preg_match('/^\#[0-9a-f]{6}$/', $passport->getHairColor())) {
            return false;
        }
        
        //ecl (Eye Color) - exactly one of: amb blu brn gry grn hzl oth.
        if (!in_array($passport->getEyeColor(), ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'])) {
            return false;
        }

        //pid (Passport ID) - a nine-digit number, including leading zeroes.
        if (!preg_match('/^[0-9]{9}$/', $passport->getPassportId())) {
            return false;
        }

        return true;
    }
}
