<?php
namespace HomeBank\Domain\Entities\Phone\Model;

use HomeBank\Domain\Entities\Phone\Exception\PhoneValidatorException;
use HomeBank\Domain\Entities\Phone\Formatter\ToITUFromRusFormatter;
use HomeBank\Domain\Entities\Phone\Validator\RusPhoneValidator;
use HomeBank\Domain\Entities\Phone\Types\PhoneFormatterType;
use HomeBank\Domain\Entities\Phone\Types\PhoneValidatorType;

/**
 * Класс, который гарантирует корректность номера по международному стандарту ITU-T
 */
class Phone
{
    private readonly string $number;

    /**
     * @throws PhoneValidatorException
     */
    public function __construct(string $rawNumber, ?PhoneValidatorType $phoneValidator = null, ?PhoneFormatterType $phoneFormatter = null) {
        if(is_null($phoneValidator))
            $phoneValidator = new RusPhoneValidator();

        if(!$phoneValidator->isValid($rawNumber))
            throw new PhoneValidatorException("Телефонный номер {$rawNumber} невалиден");

        if(is_null($phoneFormatter))
            $phoneFormatter = new ToITUFromRusFormatter();

        $this->number = $phoneFormatter->format($rawNumber);
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}