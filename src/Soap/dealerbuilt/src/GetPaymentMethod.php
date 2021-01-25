<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetPaymentMethod.
 */
class GetPaymentMethod
{
    /**
     * @var string[]
     */
    private $paymentMethodKeys = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToPaymentMethodKeys($string)
    {
        $this->paymentMethodKeys[] = $string;

        return $this;
    }

    /**
     * isset paymentMethodKeys.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPaymentMethodKeys($index)
    {
        return isset($this->paymentMethodKeys[$index]);
    }

    /**
     * unset paymentMethodKeys.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPaymentMethodKeys($index)
    {
        unset($this->paymentMethodKeys[$index]);
    }

    /**
     * Gets as paymentMethodKeys.
     *
     * @return string[]
     */
    public function getPaymentMethodKeys()
    {
        return $this->paymentMethodKeys;
    }

    /**
     * Sets a new paymentMethodKeys.
     *
     * @param string[] $paymentMethodKeys
     *
     * @return self
     */
    public function setPaymentMethodKeys(array $paymentMethodKeys)
    {
        $this->paymentMethodKeys = $paymentMethodKeys;

        return $this;
    }
}
