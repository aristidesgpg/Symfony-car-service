<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing LeaseFeeCollectionType
 *
 * 
 * XSD Type: LeaseFeeCollection
 */
class LeaseFeeCollectionType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\AcquisitionFeeType $acquisition
     */
    private $acquisition = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[] $dealerFees
     */
    private $dealerFees = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $disposition
     */
    private $disposition = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $licensing
     */
    private $licensing = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $proratedLicensing
     */
    private $proratedLicensing = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $tradeLicensing
     */
    private $tradeLicensing = null;

    /**
     * Gets as acquisition
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\AcquisitionFeeType
     */
    public function getAcquisition()
    {
        return $this->acquisition;
    }

    /**
     * Sets a new acquisition
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\AcquisitionFeeType $acquisition
     * @return self
     */
    public function setAcquisition(\App\Soap\dealerbuilt\src\Models\Sales\AcquisitionFeeType $acquisition)
    {
        $this->acquisition = $acquisition;
        return $this;
    }

    /**
     * Adds as dealerFee
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType $dealerFee
     */
    public function addToDealerFees(\App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType $dealerFee)
    {
        $this->dealerFees[] = $dealerFee;
        return $this;
    }

    /**
     * isset dealerFees
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDealerFees($index)
    {
        return isset($this->dealerFees[$index]);
    }

    /**
     * unset dealerFees
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDealerFees($index)
    {
        unset($this->dealerFees[$index]);
    }

    /**
     * Gets as dealerFees
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[]
     */
    public function getDealerFees()
    {
        return $this->dealerFees;
    }

    /**
     * Sets a new dealerFees
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[] $dealerFees
     * @return self
     */
    public function setDealerFees(array $dealerFees)
    {
        $this->dealerFees = $dealerFees;
        return $this;
    }

    /**
     * Gets as disposition
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType
     */
    public function getDisposition()
    {
        return $this->disposition;
    }

    /**
     * Sets a new disposition
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $disposition
     * @return self
     */
    public function setDisposition(\App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $disposition)
    {
        $this->disposition = $disposition;
        return $this;
    }

    /**
     * Gets as licensing
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType
     */
    public function getLicensing()
    {
        return $this->licensing;
    }

    /**
     * Sets a new licensing
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $licensing
     * @return self
     */
    public function setLicensing(\App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $licensing)
    {
        $this->licensing = $licensing;
        return $this;
    }

    /**
     * Gets as proratedLicensing
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType
     */
    public function getProratedLicensing()
    {
        return $this->proratedLicensing;
    }

    /**
     * Sets a new proratedLicensing
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $proratedLicensing
     * @return self
     */
    public function setProratedLicensing(\App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $proratedLicensing)
    {
        $this->proratedLicensing = $proratedLicensing;
        return $this;
    }

    /**
     * Gets as tradeLicensing
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType
     */
    public function getTradeLicensing()
    {
        return $this->tradeLicensing;
    }

    /**
     * Sets a new tradeLicensing
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $tradeLicensing
     * @return self
     */
    public function setTradeLicensing(\App\Soap\dealerbuilt\src\Models\Sales\LeaseLicensingFeeType $tradeLicensing)
    {
        $this->tradeLicensing = $tradeLicensing;
        return $this;
    }


}

