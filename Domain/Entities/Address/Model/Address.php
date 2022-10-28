<?php

namespace HomeBank\Domain\Entities\Address\Model;

class Address
{
    private readonly string $fullAddress;
    private readonly string $city;
    private readonly string $street;
    private readonly string $house;
    private readonly ?string $officeOrApartment;

    public function __construct(string $fullAddress, string $city, string $street, string $house, ?string $officeOrApartment = null) {
        $this->fullAddress = $fullAddress;
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
        $this->officeOrApartment = $officeOrApartment;
    }

    public function getFullAddress(): string
    {
        return $this->fullAddress;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getHouse(): string
    {
        return $this->house;
    }

    public function getOfficeOrApartment(): ?string
    {
        return $this->officeOrApartment;
    }
}