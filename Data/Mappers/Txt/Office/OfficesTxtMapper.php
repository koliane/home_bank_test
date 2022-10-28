<?php
namespace HomeBank\Data\Mappers\Txt\Office;

use Exception;
use HomeBank\Domain\Entities\Address\Exception\AddressFactoryException;
use HomeBank\Domain\Entities\Address\Factory\AddressFactory;
use HomeBank\Domain\Entities\Office\Collection\OfficeCollection;
use HomeBank\Domain\Entities\Office\Model\Office;
use HomeBank\Domain\Entities\Phone\Exception\PhoneValidatorException;
use HomeBank\Domain\Entities\Phone\Model\Phone;

class OfficesTxtMapper implements OfficesTxtMapperType
{
    /**
     * @throws PhoneValidatorException
     * @throws AddressFactoryException
     * @throws Exception
     */
    public function fromTxt(string $text): OfficeCollection {
        $result = new OfficeCollection();
        $arRawOffices = explode("\r\n\r\n", $text);
        foreach($arRawOffices as $rawOffice) {
            $rows = explode("\r\n", $rawOffice);

            $id = null;
            $name = null;
            $rawAddress = null;
            $rawPhone = null;
            foreach ($rows as $row) {
                list($field, $value) = explode(': ', $row);

                switch ($field) {
                    case 'id': $id = $value; break;
                    case 'name': $name = $value; break;
                    case 'address': $rawAddress = $value; break;
                    case 'phone': $rawPhone = $value; break;
                }
            }

            foreach ([$id, $name, $rawAddress, $rawPhone] as $value) {
                if (is_null($value))
                    throw new Exception("В фиде нет всех необходимых полей");
            }

            $office = new Office(
                id: $id,
                name: $name,
                address: (new AddressFactory($rawAddress))->create(),
                phone: new Phone($rawPhone),
            );

            $result->add($office);
        }

        return $result;
    }
}