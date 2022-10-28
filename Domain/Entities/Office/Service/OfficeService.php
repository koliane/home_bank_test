<?php

namespace HomeBank\Domain\Entities\Office\Service;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;
use HomeBank\Domain\Entities\Office\Types\OfficesListProviderType;
use HomeBank\Domain\Entities\Office\Repository\OfficeRepository;
use HomeBank\Domain\Entities\Office\Types\OfficesSaverProviderType;

class OfficeService
{
    public function getOffices(OfficesListProviderType $officesProvider): OfficeCollection {
        return (new OfficeRepository())->getOffices($officesProvider);
    }

    public function saveOffices(OfficeCollection $offices, OfficesSaverProviderType $officesSaverProvider) {
        $officesSaverProvider->saveOffices($offices);
    }
}