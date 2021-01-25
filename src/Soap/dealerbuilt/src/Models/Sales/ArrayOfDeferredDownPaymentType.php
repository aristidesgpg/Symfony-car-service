<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfDeferredDownPaymentType.
 *
 * XSD Type: ArrayOfDeferredDownPayment
 */
class ArrayOfDeferredDownPaymentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType[]
     */
    private $deferredDownPayment = [
    ];

    /**
     * Adds as deferredDownPayment.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType $deferredDownPayment
     */
    public function addToDeferredDownPayment(DeferredDownPaymentType $deferredDownPayment)
    {
        $this->deferredDownPayment[] = $deferredDownPayment;

        return $this;
    }

    /**
     * isset deferredDownPayment.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDeferredDownPayment($index)
    {
        return isset($this->deferredDownPayment[$index]);
    }

    /**
     * unset deferredDownPayment.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDeferredDownPayment($index)
    {
        unset($this->deferredDownPayment[$index]);
    }

    /**
     * Gets as deferredDownPayment.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType[]
     */
    public function getDeferredDownPayment()
    {
        return $this->deferredDownPayment;
    }

    /**
     * Sets a new deferredDownPayment.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType[] $deferredDownPayment
     *
     * @return self
     */
    public function setDeferredDownPayment(array $deferredDownPayment)
    {
        $this->deferredDownPayment = $deferredDownPayment;

        return $this;
    }
}
