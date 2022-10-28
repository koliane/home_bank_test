<?php

namespace HomeBank\Domain\Entities\Address\Type;

use HomeBank\Domain\Entities\Address\Model\Address;

interface AddressFactoryType
{
    public function create(): Address;
}