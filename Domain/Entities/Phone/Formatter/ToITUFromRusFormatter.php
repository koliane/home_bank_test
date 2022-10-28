<?php

namespace HomeBank\Domain\Entities\Phone\Formatter;

use HomeBank\Domain\Entities\Phone\Types\PhoneFormatterType;

class ToITUFromRusFormatter implements PhoneFormatterType
{

    public function format(string $phone): string
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
        $firstNumber = (int)$cleanPhone[0];
        if($firstNumber === 8)
            $cleanPhone = substr_replace($cleanPhone, "+7", 0, 1);
        else
            $cleanPhone = "+". $cleanPhone;

        return $cleanPhone;
    }
}