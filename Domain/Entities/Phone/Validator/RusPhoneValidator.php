<?php

namespace HomeBank\Domain\Entities\Phone\Validator;

use HomeBank\Domain\Entities\Phone\Types\PhoneValidatorType;

class RusPhoneValidator implements PhoneValidatorType
{
    const NUMBERS_QUANTITY_LIMIT = 11;

    function isValid(string $phone): bool
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);

        $numbersQuantity = strlen($cleanPhone);
        if($numbersQuantity != self::NUMBERS_QUANTITY_LIMIT)
            return false;

        $firstSymbol = $phone[0];
        $firstNumber = (int)$cleanPhone[0];
        if( $firstSymbol === '+' && $firstNumber !== 7
            || $firstSymbol !== '+' && $firstNumber !== 8
        )
            return false;


        return true;
    }
}