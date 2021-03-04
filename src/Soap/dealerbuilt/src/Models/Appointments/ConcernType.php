<?php

namespace App\Soap\dealerbuilt\src\Models\Appointments;

/**
 * Class representing ConcernType
 *
 * 
 * XSD Type: Concern
 */
class ConcernType
{

    /**
     * @var string $campaignDispositionCode
     */
    private $campaignDispositionCode = null;

    /**
     * @var string $campaignNumber
     */
    private $campaignNumber = null;

    /**
     * @var string $causeDescription
     */
    private $causeDescription = null;

    /**
     * @var string $correction
     */
    private $correction = null;

    /**
     * @var string $customerStatement
     */
    private $customerStatement = null;

    /**
     * @var string $departmentDescription
     */
    private $departmentDescription = null;

    /**
     * @var int $departmentId
     */
    private $departmentId = null;

    /**
     * @var string $jobCode
     */
    private $jobCode = null;

    /**
     * @var int $minutesEstimated
     */
    private $minutesEstimated = null;

    /**
     * @var string $payType
     */
    private $payType = null;

    /**
     * @var int $seq
     */
    private $seq = null;

    /**
     * Gets as campaignDispositionCode
     *
     * @return string
     */
    public function getCampaignDispositionCode()
    {
        return $this->campaignDispositionCode;
    }

    /**
     * Sets a new campaignDispositionCode
     *
     * @param string $campaignDispositionCode
     * @return self
     */
    public function setCampaignDispositionCode($campaignDispositionCode)
    {
        $this->campaignDispositionCode = $campaignDispositionCode;
        return $this;
    }

    /**
     * Gets as campaignNumber
     *
     * @return string
     */
    public function getCampaignNumber()
    {
        return $this->campaignNumber;
    }

    /**
     * Sets a new campaignNumber
     *
     * @param string $campaignNumber
     * @return self
     */
    public function setCampaignNumber($campaignNumber)
    {
        $this->campaignNumber = $campaignNumber;
        return $this;
    }

    /**
     * Gets as causeDescription
     *
     * @return string
     */
    public function getCauseDescription()
    {
        return $this->causeDescription;
    }

    /**
     * Sets a new causeDescription
     *
     * @param string $causeDescription
     * @return self
     */
    public function setCauseDescription($causeDescription)
    {
        $this->causeDescription = $causeDescription;
        return $this;
    }

    /**
     * Gets as correction
     *
     * @return string
     */
    public function getCorrection()
    {
        return $this->correction;
    }

    /**
     * Sets a new correction
     *
     * @param string $correction
     * @return self
     */
    public function setCorrection($correction)
    {
        $this->correction = $correction;
        return $this;
    }

    /**
     * Gets as customerStatement
     *
     * @return string
     */
    public function getCustomerStatement()
    {
        return $this->customerStatement;
    }

    /**
     * Sets a new customerStatement
     *
     * @param string $customerStatement
     * @return self
     */
    public function setCustomerStatement($customerStatement)
    {
        $this->customerStatement = $customerStatement;
        return $this;
    }

    /**
     * Gets as departmentDescription
     *
     * @return string
     */
    public function getDepartmentDescription()
    {
        return $this->departmentDescription;
    }

    /**
     * Sets a new departmentDescription
     *
     * @param string $departmentDescription
     * @return self
     */
    public function setDepartmentDescription($departmentDescription)
    {
        $this->departmentDescription = $departmentDescription;
        return $this;
    }

    /**
     * Gets as departmentId
     *
     * @return int
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Sets a new departmentId
     *
     * @param int $departmentId
     * @return self
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
        return $this;
    }

    /**
     * Gets as jobCode
     *
     * @return string
     */
    public function getJobCode()
    {
        return $this->jobCode;
    }

    /**
     * Sets a new jobCode
     *
     * @param string $jobCode
     * @return self
     */
    public function setJobCode($jobCode)
    {
        $this->jobCode = $jobCode;
        return $this;
    }

    /**
     * Gets as minutesEstimated
     *
     * @return int
     */
    public function getMinutesEstimated()
    {
        return $this->minutesEstimated;
    }

    /**
     * Sets a new minutesEstimated
     *
     * @param int $minutesEstimated
     * @return self
     */
    public function setMinutesEstimated($minutesEstimated)
    {
        $this->minutesEstimated = $minutesEstimated;
        return $this;
    }

    /**
     * Gets as payType
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType
     *
     * @param string $payType
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;
        return $this;
    }

    /**
     * Gets as seq
     *
     * @return int
     */
    public function getSeq()
    {
        return $this->seq;
    }

    /**
     * Sets a new seq
     *
     * @param int $seq
     * @return self
     */
    public function setSeq($seq)
    {
        $this->seq = $seq;
        return $this;
    }


}

