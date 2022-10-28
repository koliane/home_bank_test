<?php
namespace HomeBank\Data\Mappers\Json\Office;

use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;
use HomeBank\Domain\Entities\Office\Model\Office;
use HomeBank\Domain\Entities\Phone\Formatter\ToOfficialFromITUFormatter;
use HomeBank\Domain\Entities\Phone\Formatter\ToOnlyNumbersFromITUFormatter;

class OfficesJsonMapper implements OfficesJsonMapperType
{
    private const OFFICE_TYPE = 'office';

    public function toJson(OfficeCollection $offices): string {
        $arRawOffices = [];
        /** @var Office $office */
        foreach($offices as $office) {
            $address = $office->getAddress();
            $phone = $office->getPhone();
            $officialPhoneNumber = (new ToOfficialFromITUFormatter())->format($phone->getNumber());
            $countryPhoneNumber = (new ToOnlyNumbersFromITUFormatter())->format($phone->getNumber());
            $arRawOffices[] = [
                "type" => self::OFFICE_TYPE,
                "id" => $office->getId(),
                "attributes" => [
                    "name" => $office->getName(),
                    "address" => [
                        "city" => $address->getCity(),
                        "street" => $address->getStreet(),
                        "house" => $address->getHouse(),
                        "officeOrApartment" => $address->getOfficeOrApartment(),
                    ],
                    "phone" => [
                        "countryNumber" => $countryPhoneNumber,
                        "official" => $officialPhoneNumber,
                    ]
                ]
            ];
        }

        return json_encode([
            'data' => $arRawOffices
        ], true);
    }
}