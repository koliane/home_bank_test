<?php

namespace HomeBank\Domain\Entities\Office\Model;

use HomeBank\Domain\Entities\Address\Model\Address;
use HomeBank\Domain\Entities\Phone\Model\Phone;

class Office
{
    private readonly int $id;
    private readonly string $name;
    private readonly Address $address;
    private readonly Phone $phone;

    public function __construct(int $id, string $name, Address $address, Phone $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }


}