<?php

namespace HomeBank\Domain\Entities\Office\Repository;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;
use HomeBank\Domain\Entities\Office\Types\OfficesListProviderType;

class OfficeRepository
{
    public function getOffices(OfficesListProviderType $officesProvider): OfficeCollection {
        return $officesProvider->provideOffices();
    }
}