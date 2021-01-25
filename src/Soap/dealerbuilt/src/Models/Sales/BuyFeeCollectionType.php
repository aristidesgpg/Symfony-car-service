<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing BuyFeeCollectionType
 *
 * 
 * XSD Type: BuyFeeCollection
 */
class BuyFeeCollectionType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $bank
     */
    private $bank = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[] $dealerFees
     */
    private $dealerFees = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $licensing
     */
    private $licensing = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $loanOrigination
     */
    private $loanOrigination = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $loanProcessing
     */
    private $loanProcessing = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $proratedLicensing
     */
    private $proratedLicensing = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $tradeLicensing
     */
    private $tradeLicensing = null;

    /**
     * Gets as bank
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Sets a new bank
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $bank
     * @return self
     */
    public function setBank(\App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $bank)
    {
        $this->bank = $bank;
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
     * Gets as licensing
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType
     */
    public function getLicensing()
    {
        return $this->licensing;
    }

    /**
     * Sets a new licensing
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $licensing
     * @return self
     */
    public function setLicensing(\App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $licensing)
    {
        $this->licensing = $licensing;
        return $this;
    }

    /**
     * Gets as loanOrigination
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType
     */
    public function getLoanOrigination()
    {
        return $this->loanOrigination;
    }

    /**
     * Sets a new loanOrigination
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $loanOrigination
     * @return self
     */
    public function setLoanOrigination(\App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $loanOrigination)
    {
        $this->loanOrigination = $loanOrigination;
        return $this;
    }

    /**
     * Gets as loanProcessing
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType
     */
    public function getLoanProcessing()
    {
        return $this->loanProcessing;
    }

    /**
     * Sets a new loanProcessing
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $loanProcessing
     * @return self
     */
    public function setLoanProcessing(\App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $loanProcessing)
    {
        $this->loanProcessing = $loanProcessing;
        return $this;
    }

    /**
     * Gets as proratedLicensing
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType
     */
    public function getProratedLicensing()
    {
        return $this->proratedLicensing;
    }

    /**
     * Sets a new proratedLicensing
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $proratedLicensing
     * @return self
     */
    public function setProratedLicensing(\App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $proratedLicensing)
    {
        $this->proratedLicensing = $proratedLicensing;
        return $this;
    }

    /**
     * Gets as tradeLicensing
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType
     */
    public function getTradeLicensing()
    {
        return $this->tradeLicensing;
    }

    /**
     * Sets a new tradeLicensing
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $tradeLicensing
     * @return self
     */
    public function setTradeLicensing(\App\Soap\dealerbuilt\src\Models\Sales\StandardFeeType $tradeLicensing)
    {
        $this->tradeLicensing = $tradeLicensing;
        return $this;
    }


}

