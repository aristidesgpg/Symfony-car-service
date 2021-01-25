<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPushedPaymentType.
 *
 * XSD Type: ArrayOfPushedPayment
 */
class ArrayOfPushedPaymentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType[]
     */
    private $pushedPayment = [
    ];

    /**
     * Adds as pushedPayment.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType $pushedPayment
     */
    public function addToPushedPayment(PushedPaymentType $pushedPayment)
    {
        $this->pushedPayment[] = $pushedPayment;

        return $this;
    }

    /**
     * isset pushedPayment.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushedPayment($index)
    {
        return isset($this->pushedPayment[$index]);
    }

    /**
     * unset pushedPayment.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushedPayment($index)
    {
        unset($this->pushedPayment[$index]);
    }

    /**
     * Gets as pushedPayment.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType[]
     */
    public function getPushedPayment()
    {
        return $this->pushedPayment;
    }

    /**
     * Sets a new pushedPayment.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType[] $pushedPayment
     *
     * @return self
     */
    public function setPushedPayment(array $pushedPayment)
    {
        $this->pushedPayment = $pushedPayment;

        return $this;
    }
}
