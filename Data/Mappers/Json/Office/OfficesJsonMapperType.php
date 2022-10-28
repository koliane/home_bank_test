<?php

namespace HomeBank\Data\Mappers\Json\Office;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;

interface OfficesJsonMapperType
{
    public function toJson(OfficeCollection $offices): string;
}