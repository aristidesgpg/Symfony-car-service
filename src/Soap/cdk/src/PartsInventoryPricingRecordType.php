<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsInventoryPricingRecordType
 *
 * 
 * XSD Type: partsInventoryPricingRecord
 */
class PartsInventoryPricingRecordType
{

    /**
     * @var string $customerNumber
     */
    private $customerNumber = null;

    /**
     * @var string $saleType
     */
    private $saleType = null;

    /**
     * @var string $partNumber
     */
    private $partNumber = null;

    /**
     * @var string $laborType
     */
    private $laborType = null;

    /**
     * @var string $checkOLM
     */
    private $checkOLM = null;

    /**
     * @var string $olmMfgCode
     */
    private $olmMfgCode = null;

    /**
     * @var string $source
     */
    private $source = null;

    /**
     * @var string $chkMaster
     */
    private $chkMaster = null;

    /**
     * Gets as customerNumber
     *
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * Sets a new customerNumber
     *
     * @param string $customerNumber
     * @return self
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    /**
     * Gets as saleType
     *
     * @return string
     */
    public function getSaleType()
    {
        return $this->saleType;
    }

    /**
     * Sets a new saleType
     *
     * @param string $saleType
     * @return self
     */
    public function setSaleType($saleType)
    {
        $this->saleType = $saleType;
        return $this;
    }

    /**
     * Gets as partNumber
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber
     *
     * @param string $partNumber
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;
        return $this;
    }

    /**
     * Gets as laborType
     *
     * @return string
     */
    public function getLaborType()
    {
        return $this->laborType;
    }

    /**
     * Sets a new laborType
     *
     * @param string $laborType
     * @return self
     */
    public function setLaborType($laborType)
    {
        $this->laborType = $laborType;
        return $this;
    }

    /**
     * Gets as checkOLM
     *
     * @return string
     */
    public function getCheckOLM()
    {
        return $this->checkOLM;
    }

    /**
     * Sets a new checkOLM
     *
     * @param string $checkOLM
     * @return self
     */
    public function setCheckOLM($checkOLM)
    {
        $this->checkOLM = $checkOLM;
        return $this;
    }

    /**
     * Gets as olmMfgCode
     *
     * @return string
     */
    public function getOlmMfgCode()
    {
        return $this->olmMfgCode;
    }

    /**
     * Sets a new olmMfgCode
     *
     * @param string $olmMfgCode
     * @return self
     */
    public function setOlmMfgCode($olmMfgCode)
    {
        $this->olmMfgCode = $olmMfgCode;
        return $this;
    }

    /**
     * Gets as source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets a new source
     *
     * @param string $source
     * @return self
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Gets as chkMaster
     *
     * @return string
     */
    public function getChkMaster()
    {
        return $this->chkMaster;
    }

    /**
     * Sets a new chkMaster
     *
     * @param string $chkMaster
     * @return self
     */
    public function setChkMaster($chkMaster)
    {
        $this->chkMaster = $chkMaster;
        return $this;
    }


}

