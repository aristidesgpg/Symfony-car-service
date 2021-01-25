<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PaymentStatusType
 *
 * 
 * XSD Type: PaymentStatus
 */
class PaymentStatusType extends ApiServiceLocationItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue
     */
    private $balanceDue = null;

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
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentType[] $payments
     */
    private $payments = null;

    /**
     * Gets as balanceDue
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBalanceDue()
    {
        return $this->balanceDue;
    }

    /**
     * Sets a new balanceDue
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue
     * @return self
     */
    public function setBalanceDue(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue)
    {
        $this->balanceDue = $balanceDue;
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
     * Adds as payment
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentType $payment
     */
    public function addToPayments(\App\Soap\dealerbuilt\src\BaseApi\PaymentType $payment)
    {
        $this->payments[] = $payment;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentType[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets a new payments
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentType[] $payments
     * @return self
     */
    public function setPayments(array $payments)
    {
        $this->payments = $payments;
        return $this;
    }


}

