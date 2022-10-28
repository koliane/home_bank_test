<?php

namespace HomeBank\Domain\Entities\Address\Factory;

use HomeBank\Domain\Entities\Address\Exception\AddressFactoryException;
use HomeBank\Domain\Entities\Address\Model\Address;
use HomeBank\Domain\Entities\Address\Type\AddressFactoryType;

class AddressFactory implements AddressFactoryType
{
    private string $rawAddress;

    public function __construct(string $rawAddress) {
        $this->rawAddress = $rawAddress;
    }

    /**
     * @throws AddressFactoryException
     */
    public function create(): Address
    {
        $cityPrefix = "г.";
        $streetPrefix = "улица";
        $housePrefix = "дом";
        $officeOrApartmentPrefix = "офис";

        $pattern = "/{$cityPrefix}(?<city>.+?)({$streetPrefix})(?<street>.+?)({$housePrefix})(?<house>.+?)(({$officeOrApartmentPrefix})(?<office>.+?))?$/u";
        $status = preg_match($pattern, $this->rawAddress, $matches);
        if($status !== 1)
            throw new AddressFactoryException("Ошибка парсинга адреса");

        if( !isset($matches['city'])
            || !isset($matches['street'])
            || !isset($matches['house'])
        ) {
            throw new AddressFactoryException("Недостаточно совпадений в адресе");
        }

        return new Address(
            fullAddress: $this->rawAddress,
            city: trim($matches['city']),
            street: trim($matches['street']),
            house: trim($matches['house']),
            officeOrApartment: isset($matches['office']) ? trim($matches['office']) : null,
        );
    }
}