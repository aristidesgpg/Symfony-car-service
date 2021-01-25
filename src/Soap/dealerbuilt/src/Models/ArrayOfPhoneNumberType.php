<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing ArrayOfPhoneNumberType.
 *
 * XSD Type: ArrayOfPhoneNumber
 */
class ArrayOfPhoneNumberType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\PhoneNumberType[]
     */
    private $phoneNumber = [
    ];

    /**
     * Adds as phoneNumber.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType $phoneNumber
     */
    public function addToPhoneNumber(PhoneNumberType $phoneNumber)
    {
        $this->phoneNumber[] = $phoneNumber;

        return $this;
    }

    /**
     * isset phoneNumber.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPhoneNumber($index)
    {
        return isset($this->phoneNumber[$index]);
    }

    /**
     * unset phoneNumber.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPhoneNumber($index)
    {
        unset($this->phoneNumber[$index]);
    }

    /**
     * Gets as phoneNumber.
     *
     * @return \App\Soap\dealerbuilt\src\Models\PhoneNumberType[]
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets a new phoneNumber.
     *
     * @param \App\Soap\dealerbuilt\src\Models\PhoneNumberType[] $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(array $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
