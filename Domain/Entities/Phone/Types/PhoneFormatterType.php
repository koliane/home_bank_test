<?php

namespace HomeBank\Domain\Entities\Phone\Types;

interface PhoneFormatterType
{
    public function format(string $phone): string;
}