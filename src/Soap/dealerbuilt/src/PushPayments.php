<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushPayments.
 */
class PushPayments
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType[]
     */
    private $request = null;

    /**
     * Adds as paymentPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType $paymentPushRequest
     */
    public function addToRequest(BaseApi\PaymentPushRequestType $paymentPushRequest)
    {
        $this->request[] = $paymentPushRequest;

        return $this;
    }

    /**
     * isset request.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRequest($index)
    {
        return isset($this->request[$index]);
    }

    /**
     * unset request.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRequest($index)
    {
        unset($this->request[$index]);
    }

    /**
     * Gets as request.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType[]
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets a new request.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType[] $request
     *
     * @return self
     */
    public function setRequest(array $request)
    {
        $this->request = $request;

        return $this;
    }
}
