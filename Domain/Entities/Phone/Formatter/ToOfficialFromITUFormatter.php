<?php

namespace HomeBank\Domain\Entities\Phone\Formatter;

use HomeBank\Domain\Entities\Phone\Types\PhoneFormatterType;

class ToOfficialFromITUFormatter implements PhoneFormatterType
{
    private const START_CITY_CODE_INDEX = 2;
    private const CITY_CODE_LENGTH = 3;

    public function format(string $phone): string
    {
        $cityCode = substr($phone, self::START_CITY_CODE_INDEX, self::CITY_CODE_LENGTH);
        $abonentNumber = substr($phone, self::START_CITY_CODE_INDEX + self::CITY_CODE_LENGTH);
        $formattedAbonentNumber = vsprintf("%s-%s-%s", [
            substr($abonentNumber, 0, 3),
            substr($abonentNumber, 3, 2),
            substr($abonentNumber, 5, 2),
        ]);

        return sprintf("8(%s)%s", $cityCode, $formattedAbonentNumber);
    }
}