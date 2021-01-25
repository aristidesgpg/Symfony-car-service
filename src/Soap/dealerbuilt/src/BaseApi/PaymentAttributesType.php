<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PaymentAttributesType.
 *
 * XSD Type: PaymentAttributes
 */
class PaymentAttributesType
{
    /**
     * @var string
     */
    private $control2 = null;

    /**
     * Gets as control2.
     *
     * @return string
     */
    public function getControl2()
    {
        return $this->control2;
    }

    /**
     * Sets a new control2.
     *
     * @param string $control2
     *
     * @return self
     */
    public function setControl2($control2)
    {
        $this->control2 = $control2;

        return $this;
    }
}
