<?php

namespace HomeBank\Domain\Entities\Phone\Types;

interface PhoneValidatorType
{
    function isValid(string $phone): bool;
}