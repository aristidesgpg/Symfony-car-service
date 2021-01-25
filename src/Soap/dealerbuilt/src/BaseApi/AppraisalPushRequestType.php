<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AppraisalPushRequestType
 *
 * 
 * XSD Type: AppraisalPushRequest
 */
class AppraisalPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $acv
     */
    private $acv = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $allowance
     */
    private $allowance = null;

    /**
     * @var string $appraisalKey
     */
    private $appraisalKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $dealKey
     */
    private $dealKey = null;

    /**
     * @var string $externalAppraisalId
     */
    private $externalAppraisalId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoff
     */
    private $payoff = null;

    /**
     * @var string $payoffAccount
     */
    private $payoffAccount = null;

    /**
     * @var string $payoffAddress
     */
    private $payoffAddress = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoffAmount
     */
    private $payoffAmount = null;

    /**
     * @var string $payoffCityStateZip
     */
    private $payoffCityStateZip = null;

    /**
     * @var string $payoffComments
     */
    private $payoffComments = null;

    /**
     * @var \DateTime $payoffDate
     */
    private $payoffDate = null;

    /**
     * @var string $payoffLenderCode
     */
    private $payoffLenderCode = null;

    /**
     * @var string $payoffLenderName
     */
    private $payoffLenderName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoffPerDiem
     */
    private $payoffPerDiem = null;

    /**
     * @var string $payoffPhone
     */
    private $payoffPhone = null;

    /**
     * Gets as acv
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAcv()
    {
        return $this->acv;
    }

    /**
     * Sets a new acv
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $acv
     * @return self
     */
    public function setAcv(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $acv)
    {
        $this->acv = $acv;
        return $this;
    }

    /**
     * Gets as allowance
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAllowance()
    {
        return $this->allowance;
    }

    /**
     * Sets a new allowance
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $allowance
     * @return self
     */
    public function setAllowance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $allowance)
    {
        $this->allowance = $allowance;
        return $this;
    }

    /**
     * Gets as appraisalKey
     *
     * @return string
     */
    public function getAppraisalKey()
    {
        return $this->appraisalKey;
    }

    /**
     * Sets a new appraisalKey
     *
     * @param string $appraisalKey
     * @return self
     */
    public function setAppraisalKey($appraisalKey)
    {
        $this->appraisalKey = $appraisalKey;
        return $this;
    }

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as dealKey
     *
     * @return string
     */
    public function getDealKey()
    {
        return $this->dealKey;
    }

    /**
     * Sets a new dealKey
     *
     * @param string $dealKey
     * @return self
     */
    public function setDealKey($dealKey)
    {
        $this->dealKey = $dealKey;
        return $this;
    }

    /**
     * Gets as externalAppraisalId
     *
     * @return string
     */
    public function getExternalAppraisalId()
    {
        return $this->externalAppraisalId;
    }

    /**
     * Sets a new externalAppraisalId
     *
     * @param string $externalAppraisalId
     * @return self
     */
    public function setExternalAppraisalId($externalAppraisalId)
    {
        $this->externalAppraisalId = $externalAppraisalId;
        return $this;
    }

    /**
     * Gets as payoff
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPayoff()
    {
        return $this->payoff;
    }

    /**
     * Sets a new payoff
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoff
     * @return self
     */
    public function setPayoff(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoff)
    {
        $this->payoff = $payoff;
        return $this;
    }

    /**
     * Gets as payoffAccount
     *
     * @return string
     */
    public function getPayoffAccount()
    {
        return $this->payoffAccount;
    }

    /**
     * Sets a new payoffAccount
     *
     * @param string $payoffAccount
     * @return self
     */
    public function setPayoffAccount($payoffAccount)
    {
        $this->payoffAccount = $payoffAccount;
        return $this;
    }

    /**
     * Gets as payoffAddress
     *
     * @return string
     */
    public function getPayoffAddress()
    {
        return $this->payoffAddress;
    }

    /**
     * Sets a new payoffAddress
     *
     * @param string $payoffAddress
     * @return self
     */
    public function setPayoffAddress($payoffAddress)
    {
        $this->payoffAddress = $payoffAddress;
        return $this;
    }

    /**
     * Gets as payoffAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPayoffAmount()
    {
        return $this->payoffAmount;
    }

    /**
     * Sets a new payoffAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoffAmount
     * @return self
     */
    public function setPayoffAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoffAmount)
    {
        $this->payoffAmount = $payoffAmount;
        return $this;
    }

    /**
     * Gets as payoffCityStateZip
     *
     * @return string
     */
    public function getPayoffCityStateZip()
    {
        return $this->payoffCityStateZip;
    }

    /**
     * Sets a new payoffCityStateZip
     *
     * @param string $payoffCityStateZip
     * @return self
     */
    public function setPayoffCityStateZip($payoffCityStateZip)
    {
        $this->payoffCityStateZip = $payoffCityStateZip;
        return $this;
    }

    /**
     * Gets as payoffComments
     *
     * @return string
     */
    public function getPayoffComments()
    {
        return $this->payoffComments;
    }

    /**
     * Sets a new payoffComments
     *
     * @param string $payoffComments
     * @return self
     */
    public function setPayoffComments($payoffComments)
    {
        $this->payoffComments = $payoffComments;
        return $this;
    }

    /**
     * Gets as payoffDate
     *
     * @return \DateTime
     */
    public function getPayoffDate()
    {
        return $this->payoffDate;
    }

    /**
     * Sets a new payoffDate
     *
     * @param \DateTime $payoffDate
     * @return self
     */
    public function setPayoffDate(\DateTime $payoffDate)
    {
        $this->payoffDate = $payoffDate;
        return $this;
    }

    /**
     * Gets as payoffLenderCode
     *
     * @return string
     */
    public function getPayoffLenderCode()
    {
        return $this->payoffLenderCode;
    }

    /**
     * Sets a new payoffLenderCode
     *
     * @param string $payoffLenderCode
     * @return self
     */
    public function setPayoffLenderCode($payoffLenderCode)
    {
        $this->payoffLenderCode = $payoffLenderCode;
        return $this;
    }

    /**
     * Gets as payoffLenderName
     *
     * @return string
     */
    public function getPayoffLenderName()
    {
        return $this->payoffLenderName;
    }

    /**
     * Sets a new payoffLenderName
     *
     * @param string $payoffLenderName
     * @return self
     */
    public function setPayoffLenderName($payoffLenderName)
    {
        $this->payoffLenderName = $payoffLenderName;
        return $this;
    }

    /**
     * Gets as payoffPerDiem
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPayoffPerDiem()
    {
        return $this->payoffPerDiem;
    }

    /**
     * Sets a new payoffPerDiem
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoffPerDiem
     * @return self
     */
    public function setPayoffPerDiem(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $payoffPerDiem)
    {
        $this->payoffPerDiem = $payoffPerDiem;
        return $this;
    }

    /**
     * Gets as payoffPhone
     *
     * @return string
     */
    public function getPayoffPhone()
    {
        return $this->payoffPhone;
    }

    /**
     * Sets a new payoffPhone
     *
     * @param string $payoffPhone
     * @return self
     */
    public function setPayoffPhone($payoffPhone)
    {
        $this->payoffPhone = $payoffPhone;
        return $this;
    }


}

