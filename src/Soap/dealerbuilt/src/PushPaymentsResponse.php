<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushPaymentsResponse.
 */
class PushPaymentsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType[]
     */
    private $pushPaymentsResult = null;

    /**
     * Adds as paymentPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType $paymentPushResponse
     */
    public function addToPushPaymentsResult(BaseApi\PaymentPushResponseType $paymentPushResponse)
    {
        $this->pushPaymentsResult[] = $paymentPushResponse;

        return $this;
    }

    /**
     * isset pushPaymentsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushPaymentsResult($index)
    {
        return isset($this->pushPaymentsResult[$index]);
    }

    /**
     * unset pushPaymentsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushPaymentsResult($index)
    {
        unset($this->pushPaymentsResult[$index]);
    }

    /**
     * Gets as pushPaymentsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType[]
     */
    public function getPushPaymentsResult()
    {
        return $this->pushPaymentsResult;
    }

    /**
     * Sets a new pushPaymentsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType[] $pushPaymentsResult
     *
     * @return self
     */
    public function setPushPaymentsResult(array $pushPaymentsResult)
    {
        $this->pushPaymentsResult = $pushPaymentsResult;

        return $this;
    }
}
