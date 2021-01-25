<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PaymentPushRequestType
 *
 * 
 * XSD Type: PaymentPushRequest
 */
class PaymentPushRequestType
{

    /**
     * @var string $eventKey
     */
    private $eventKey = null;

    /**
     * @var string $eventType
     */
    private $eventType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType[] $payments
     */
    private $payments = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as eventKey
     *
     * @return string
     */
    public function getEventKey()
    {
        return $this->eventKey;
    }

    /**
     * Sets a new eventKey
     *
     * @param string $eventKey
     * @return self
     */
    public function setEventKey($eventKey)
    {
        $this->eventKey = $eventKey;
        return $this;
    }

    /**
     * Gets as eventType
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Sets a new eventType
     *
     * @param string $eventType
     * @return self
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * Adds as pushedPayment
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType $pushedPayment
     */
    public function addToPayments(\App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType $pushedPayment)
    {
        $this->payments[] = $pushedPayment;
        return $this;
    }

    /**
     * isset payments
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPayments($index)
    {
        return isset($this->payments[$index]);
    }

    /**
     * unset payments
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPayments($index)
    {
        unset($this->payments[$index]);
    }

    /**
     * Gets as payments
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets a new payments
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushedPaymentType[] $payments
     * @return self
     */
    public function setPayments(array $payments)
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }


}

