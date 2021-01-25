<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing PhoneNumberType.
 *
 * XSD Type: PhoneNumber
 */
class PhoneNumberType
{
    /**
     * @var string
     */
    private $digits = null;

    /**
     * @var string
     */
    private $numberType = null;

    /**
     * Gets as digits.
     *
     * @return string
     */
    public function getDigits()
    {
        return $this->digits;
    }

    /**
     * Sets a new digits.
     *
     * @param string $digits
     *
     * @return self
     */
    public function setDigits($digits)
    {
        $this->digits = $digits;

        return $this;
    }

    /**
     * Gets as numberType.
     *
     * @return string
     */
    public function getNumberType()
    {
        return $this->numberType;
    }

    /**
     * Sets a new numberType.
     *
     * @param string $numberType
     *
     * @return self
     */
    public function setNumberType($numberType)
    {
        $this->numberType = $numberType;

        return $this;
    }
}
