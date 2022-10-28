<?php

namespace HomeBank\Data\Mappers\Xml\Office;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;
use HomeBank\Domain\Entities\Phone\Formatter\ToOfficialFromITUFormatter;
use XMLWriter;

class OfficesXmlMapper implements OfficesXmlMapperType
{
    public function toXml(OfficeCollection $offices): string {
        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("    ");
        $xml->startDocument(encoding: "UTF-8");
        $xml->startElement("companies");

        foreach($offices as $office) {
            $phoneNumber = (new ToOfficialFromITUFormatter())->format($office->getPhone()->getNumber());

            $xml->startElement("company");
                $xml->writeElement("company-id", $office->getId());
                $xml->startElement("name");
                    $xml->writeAttribute("lang", "ru");
                    $xml->text($office->getName());
                $xml->endElement();
                $xml->writeElement("phone", $phoneNumber);
                $xml->startElement("address");
                $xml->writeAttribute("lang", "ru");
                    $xml->text($office->getAddress()->getFullAddress());
                $xml->endElement();
            $xml->endElement();

        }
        $xml->endElement();


        return $xml->outputMemory();
    }
}