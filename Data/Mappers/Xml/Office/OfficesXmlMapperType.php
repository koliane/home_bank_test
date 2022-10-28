<?php

namespace HomeBank\Data\Mappers\Xml\Office;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;

interface OfficesXmlMapperType
{
    public function toXml(OfficeCollection $offices): string;
}