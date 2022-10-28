<?php
namespace HomeBank\Data\Mappers\Txt\Office;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;

interface OfficesTxtMapperType
{
    public function fromTxt(string $text): OfficeCollection;
}