<?php

namespace HomeBank\Domain\Entities\Office\Types;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;

interface OfficesListProviderType
{
    public function provideOffices(): OfficeCollection;
}