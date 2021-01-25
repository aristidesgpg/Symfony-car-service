<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPaymentsByRepairOrderKeyResponse
 */
class PullPaymentsByRepairOrderKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType[] $pullPaymentsByRepairOrderKeyResult
     */
    private $pullPaymentsByRepairOrderKeyResult = null;

    /**
     * Adds as paymentStatus
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType $paymentStatus
     */
    public function addToPullPaymentsByRepairOrderKeyResult(\App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType $paymentStatus)
    {
        $this->pullPaymentsByRepairOrderKeyResult[] = $paymentStatus;
        return $this;
    }

    /**
     * isset pullPaymentsByRepairOrderKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullPaymentsByRepairOrderKeyResult($index)
    {
        return isset($this->pullPaymentsByRepairOrderKeyResult[$index]);
    }

    /**
     * unset pullPaymentsByRepairOrderKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullPaymentsByRepairOrderKeyResult($index)
    {
        unset($this->pullPaymentsByRepairOrderKeyResult[$index]);
    }

    /**
     * Gets as pullPaymentsByRepairOrderKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType[]
     */
    public function getPullPaymentsByRepairOrderKeyResult()
    {
        return $this->pullPaymentsByRepairOrderKeyResult;
    }

    /**
     * Sets a new pullPaymentsByRepairOrderKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType[] $pullPaymentsByRepairOrderKeyResult
     * @return self
     */
    public function setPullPaymentsByRepairOrderKeyResult(array $pullPaymentsByRepairOrderKeyResult)
    {
        $this->pullPaymentsByRepairOrderKeyResult = $pullPaymentsByRepairOrderKeyResult;
        return $this;
    }


}

