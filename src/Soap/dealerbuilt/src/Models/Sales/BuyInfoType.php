<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing BuyInfoType.
 *
 * XSD Type: BuyInfo
 */
class BuyInfoType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $amountFinanced = null;

    /**
     * @var float
     */
    private $balloonRate = null;

    /**
     * @var int
     */
    private $beaconScore = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType[]
     */
    private $deferredDownPayments = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $deliveredPrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $deposit = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\BuyFeeCollectionType
     */
    private $fees = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $finalPayment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $financeCharge = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $lsiVsi = null;

    /**
     * @var string
     */
    private $paymentDescription = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\BuyTaxCollectionType
     */
    private $taxes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalAmountFinanced = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $tradeTaxCredit = null;

    /**
     * Gets as amountFinanced.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAmountFinanced()
    {
        return $this->amountFinanced;
    }

    /**
     * Sets a new amountFinanced.
     *
     * @return self
     */
    public function setAmountFinanced(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $amountFinanced)
    {
        $this->amountFinanced = $amountFinanced;

        return $this;
    }

    /**
     * Gets as balloonRate.
     *
     * @return float
     */
    public function getBalloonRate()
    {
        return $this->balloonRate;
    }

    /**
     * Sets a new balloonRate.
     *
     * @param float $balloonRate
     *
     * @return self
     */
    public function setBalloonRate($balloonRate)
    {
        $this->balloonRate = $balloonRate;

        return $this;
    }

    /**
     * Gets as beaconScore.
     *
     * @return int
     */
    public function getBeaconScore()
    {
        return $this->beaconScore;
    }

    /**
     * Sets a new beaconScore.
     *
     * @param int $beaconScore
     *
     * @return self
     */
    public function setBeaconScore($beaconScore)
    {
        $this->beaconScore = $beaconScore;

        return $this;
    }

    /**
     * Adds as deferredDownPayment.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType $deferredDownPayment
     */
    public function addToDeferredDownPayments(DeferredDownPaymentType $deferredDownPayment)
    {
        $this->deferredDownPayments[] = $deferredDownPayment;

        return $this;
    }

    /**
     * isset deferredDownPayments.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDeferredDownPayments($index)
    {
        return isset($this->deferredDownPayments[$index]);
    }

    /**
     * unset deferredDownPayments.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDeferredDownPayments($index)
    {
        unset($this->deferredDownPayments[$index]);
    }

    /**
     * Gets as deferredDownPayments.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType[]
     */
    public function getDeferredDownPayments()
    {
        return $this->deferredDownPayments;
    }

    /**
     * Sets a new deferredDownPayments.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DeferredDownPaymentType[] $deferredDownPayments
     *
     * @return self
     */
    public function setDeferredDownPayments(array $deferredDownPayments)
    {
        $this->deferredDownPayments = $deferredDownPayments;

        return $this;
    }

    /**
     * Gets as deliveredPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDeliveredPrice()
    {
        return $this->deliveredPrice;
    }

    /**
     * Sets a new deliveredPrice.
     *
     * @return self
     */
    public function setDeliveredPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $deliveredPrice)
    {
        $this->deliveredPrice = $deliveredPrice;

        return $this;
    }

    /**
     * Gets as deposit.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDeposit()
    {
        return $this->deposit;
    }

    /**
     * Sets a new deposit.
     *
     * @return self
     */
    public function setDeposit(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $deposit)
    {
        $this->deposit = $deposit;

        return $this;
    }

    /**
     * Gets as fees.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\BuyFeeCollectionType
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Sets a new fees.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\BuyFeeCollectionType $fees
     *
     * @return self
     */
    public function setFees(BuyFeeCollectionType $fees)
    {
        $this->fees = $fees;

        return $this;
    }

    /**
     * Gets as finalPayment.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFinalPayment()
    {
        return $this->finalPayment;
    }

    /**
     * Sets a new finalPayment.
     *
     * @return self
     */
    public function setFinalPayment(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $finalPayment)
    {
        $this->finalPayment = $finalPayment;

        return $this;
    }

    /**
     * Gets as financeCharge.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFinanceCharge()
    {
        return $this->financeCharge;
    }

    /**
     * Sets a new financeCharge.
     *
     * @return self
     */
    public function setFinanceCharge(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $financeCharge)
    {
        $this->financeCharge = $financeCharge;

        return $this;
    }

    /**
     * Gets as lsiVsi.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLsiVsi()
    {
        return $this->lsiVsi;
    }

    /**
     * Sets a new lsiVsi.
     *
     * @return self
     */
    public function setLsiVsi(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $lsiVsi)
    {
        $this->lsiVsi = $lsiVsi;

        return $this;
    }

    /**
     * Gets as paymentDescription.
     *
     * @return string
     */
    public function getPaymentDescription()
    {
        return $this->paymentDescription;
    }

    /**
     * Sets a new paymentDescription.
     *
     * @param string $paymentDescription
     *
     * @return self
     */
    public function setPaymentDescription($paymentDescription)
    {
        $this->paymentDescription = $paymentDescription;

        return $this;
    }

    /**
     * Gets as taxes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\BuyTaxCollectionType
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * Sets a new taxes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\BuyTaxCollectionType $taxes
     *
     * @return self
     */
    public function setTaxes(BuyTaxCollectionType $taxes)
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * Gets as totalAmountFinanced.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalAmountFinanced()
    {
        return $this->totalAmountFinanced;
    }

    /**
     * Sets a new totalAmountFinanced.
     *
     * @return self
     */
    public function setTotalAmountFinanced(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalAmountFinanced)
    {
        $this->totalAmountFinanced = $totalAmountFinanced;

        return $this;
    }

    /**
     * Gets as tradeTaxCredit.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTradeTaxCredit()
    {
        return $this->tradeTaxCredit;
    }

    /**
     * Sets a new tradeTaxCredit.
     *
     * @return self
     */
    public function setTradeTaxCredit(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tradeTaxCredit)
    {
        $this->tradeTaxCredit = $tradeTaxCredit;

        return $this;
    }
}
