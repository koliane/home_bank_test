<?php

namespace HomeBank\Domain\Entities\Office\Types;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;

interface OfficesSaverProviderType
{
    public function saveOffices(OfficeCollection $offices): void;
}