<?php

namespace HomeBank\Domain\Entities\Phone\Formatter;

use HomeBank\Domain\Entities\Phone\Types\PhoneFormatterType;

class ToOnlyNumbersFromITUFormatter implements PhoneFormatterType
{
    public function format(string $phone): string
    {
        return substr_replace($phone, "8", 0, 2);
    }
}