<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PaymentPushResponseType
 *
 * 
 * XSD Type: PaymentPushResponse
 */
class PaymentPushResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balance
     */
    private $balance = null;

    /**
     * @var string $eventKey
     */
    private $eventKey = null;

    /**
     * @var string $eventType
     */
    private $eventType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[] $payTypeStatuses
     */
    private $payTypeStatuses = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $payments
     */
    private $payments = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as balance
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Sets a new balance
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balance
     * @return self
     */
    public function setBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $balance)
    {
        $this->balance = $balance;
        return $this;
    }

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
     * Adds as payTypeStatus
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType $payTypeStatus
     */
    public function addToPayTypeStatuses(\App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType $payTypeStatus)
    {
        $this->payTypeStatuses[] = $payTypeStatus;
        return $this;
    }

    /**
     * isset payTypeStatuses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPayTypeStatuses($index)
    {
        return isset($this->payTypeStatuses[$index]);
    }

    /**
     * unset payTypeStatuses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPayTypeStatuses($index)
    {
        unset($this->payTypeStatuses[$index]);
    }

    /**
     * Gets as payTypeStatuses
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[]
     */
    public function getPayTypeStatuses()
    {
        return $this->payTypeStatuses;
    }

    /**
     * Sets a new payTypeStatuses
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[] $payTypeStatuses
     * @return self
     */
    public function setPayTypeStatuses(array $payTypeStatuses)
    {
        $this->payTypeStatuses = $payTypeStatuses;
        return $this;
    }

    /**
     * Adds as pushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse
     */
    public function addToPayments(\App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse)
    {
        $this->payments[] = $pushResponse;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets a new payments
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $payments
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

