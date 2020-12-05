<?php
declare(strict_types=1);
namespace Day\Four;

use JsonSerializable;

class Passport implements JsonSerializable
{
    private string $birthYear;
    private string $issueYear;
    private string $expirationYear;
    private string $eyeColor;
    private string $hairColor;
    private string $height;
    private string $passportId;
    private string $countryId;

    public function set(string $property, string $value): void
    {
        $map = [
            'byr' => 'birthYear',
            'iyr' => 'issueYear',
            'eyr' => 'expirationYear',
            'ecl' => 'eyeColor',
            'hcl' => 'hairColor',
            'hgt' => 'height',
            'pid' => 'passportId',
            'cid' => 'countryId',
        ];

        $this->{$map[$property]} = $value;
    }

    public function getBirthYear(): string
    {
        return $this->birthYear;
    }

    public function getIssueYear(): string
    {
        return $this->issueYear;
    }

    public function getExpirationYear(): string
    {
        return $this->expirationYear;
    }

    public function getEyeColor(): string
    {
        return $this->eyeColor;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getHairColor(): string
    {
        return $this->hairColor;
    }

    public function getPassportId(): string
    {
        return $this->passportId;
    }

    public function getCountryId(): string
    {
        return $this->countryId;
    }

    public function __toArray(): array
    {
        return [
            'birthYear' => $this->getBirthYear(),
            'issueYear' => $this->getIssueYear(),
            'expirationYear' => $this->getExpirationYear(),
            'eyeColor' => $this->getEyeColor(),
            'hairColor' => $this->getHairColor(),
            'height' => $this->getHeight(),
            'passportId' => $this->getPassportId(),
//            'countryId' => $this->getCountryId(),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->__toArray();
    }
}
