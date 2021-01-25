<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing DealAttributesType.
 *
 * XSD Type: DealAttributes
 */
class DealAttributesType
{
    /**
     * @var string
     */
    private $advertisingSource = null;

    /**
     * @var string
     */
    private $advertisingSourceCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $basePaymentAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $baseVehicleGross = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\BuyInfoType
     */
    private $buy = null;

    /**
     * @var float
     */
    private $buyRate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cashDownPayment = null;

    /**
     * @var string
     */
    private $city = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\CobuyerInfoType
     */
    private $cobuyer = null;

    /**
     * @var \DateTime
     */
    private $contractDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\CostAddType[]
     */
    private $costAdds = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\DriversLicenseType
     */
    private $customerDriverLicense = null;

    /**
     * @var string
     */
    private $customerType = null;

    /**
     * @var string
     */
    private $customerTypeDetail = null;

    /**
     * @var \DateTime
     */
    private $dateApproved = null;

    /**
     * @var \DateTime
     */
    private $dateCheckedOut = null;

    /**
     * @var \DateTime
     */
    private $dateProcessed = null;

    /**
     * @var \DateTime
     */
    private $dateSentToAccounting = null;

    /**
     * @var \DateTime
     */
    private $dateSold = null;

    /**
     * @var int
     */
    private $daysToFirstPayment = null;

    /**
     * @var int
     */
    private $dealNumber = null;

    /**
     * @var string
     */
    private $dealPurchaseProgram = null;

    /**
     * @var string
     */
    private $dealStatus = null;

    /**
     * @var string[]
     */
    private $dealStatusList = null;

    /**
     * @var string
     */
    private $dealType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $dealerRebateAmount = null;

    /**
     * @var string
     */
    private $dealerState = null;

    /**
     * @var string
     */
    private $dealerZip = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $decrLifePremium = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $discountOtherTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $downPayment = null;

    /**
     * @var \DateTime
     */
    private $eventOccurrenceDateTime = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $feeAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $finalAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $financeCharge = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $financeChargeAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $financeDeptGross = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $financeDeptGrossWithHoldback = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    private $financeManagers = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $financeReserve = null;

    /**
     * @var \DateTime
     */
    private $firstPaymentDate = null;

    /**
     * @var string
     */
    private $fleetAccountString = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $grossSellingPrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\HardAddType[]
     */
    private $hardAdds = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $hardAddsTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType[]
     */
    private $incentives = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $incentivesTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType[]
     */
    private $insuranceProducts = null;

    /**
     * @var int
     */
    private $interestDays = null;

    /**
     * @var bool
     */
    private $isApproved = null;

    /**
     * @var bool
     */
    private $isCheckedOut = null;

    /**
     * @var bool
     */
    private $isProcessed = null;

    /**
     * @var bool
     */
    private $isSentToAccounting = null;

    /**
     * @var bool
     */
    private $isSold = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\LeaseInfoType
     */
    private $lease = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $leasePrice = null;

    /**
     * @var string
     */
    private $leaseRateMoneyFactorString = null;

    /**
     * @var string
     */
    private $lenderAddress = null;

    /**
     * @var string
     */
    private $lenderCity = null;

    /**
     * @var string
     */
    private $lenderCode = null;

    /**
     * @var string
     */
    private $lenderDealerNumber = null;

    /**
     * @var string
     */
    private $lenderFedSSN = null;

    /**
     * @var string
     */
    private $lenderName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PhoneNumberType
     */
    private $lenderPhone = null;

    /**
     * @var string
     */
    private $lenderRemitTileName = null;

    /**
     * @var string
     */
    private $lenderRemitTitleAddress = null;

    /**
     * @var string
     */
    private $lenderRemitTitleCity = null;

    /**
     * @var string
     */
    private $lenderRemitTitleName = null;

    /**
     * @var string
     */
    private $lenderRemitTitleState = null;

    /**
     * @var string
     */
    private $lenderRemitTitleZip = null;

    /**
     * @var string
     */
    private $lenderState = null;

    /**
     * @var string
     */
    private $lenderZip = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $manufacturerRebateAmount = null;

    /**
     * @var \DateTime
     */
    private $maturityDateYearMonthDate = null;

    /**
     * @var int
     */
    private $milesAtSaleDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $mrm = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $msrp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $netAmountFinanced = null;

    /**
     * @var float
     */
    private $netAnnualPercentageRate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $netCapitalizedCostAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $netTradeAllowance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $netTradeAllowanceAmount = null;

    /**
     * @var float
     */
    private $numberOfPaymentsNumeric = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $otherDeptGross = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $otherDeptGrossWithHoldback = null;

    /**
     * @var int
     */
    private $paymentCount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $prepaidFinanceChargeAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PullProductType[]
     */
    private $productDetails = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[]
     */
    private $protectionPackages = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $purchasePriceAmount = null;

    /**
     * @var float
     */
    private $rate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\RebateType[]
     */
    private $rebates = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $rebatesTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $regularPayment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $residualAmount = null;

    /**
     * @var string
     */
    private $saleCategoryString = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $salesDeptGross = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $salesDeptGrossWithHoldback = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    private $salesGeneralManager = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    private $salesManager = null;

    /**
     * @var string
     */
    private $salesNumber = null;

    /**
     * @var string
     */
    private $salesNumber2 = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    private $salesPeople = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $securityDepositAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $sellingPrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType[]
     */
    private $serviceContracts = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType[]
     */
    private $softAdds = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $taxAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $taxableSalesAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[]
     */
    private $taxes = null;

    /**
     * @var string
     */
    private $temporaryTag = null;

    /**
     * @var int
     */
    private $termMonths = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalDownPayment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalOfPayments = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalReductionsAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalTradeAllowance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $transactionPrice = null;

    /**
     * @var \DateTime
     */
    private $updateStamp = null;

    /**
     * @var string
     */
    private $upsource = null;

    /**
     * @var string
     */
    private $vehicleType = null;

    /**
     * Gets as advertisingSource.
     *
     * @return string
     */
    public function getAdvertisingSource()
    {
        return $this->advertisingSource;
    }

    /**
     * Sets a new advertisingSource.
     *
     * @param string $advertisingSource
     *
     * @return self
     */
    public function setAdvertisingSource($advertisingSource)
    {
        $this->advertisingSource = $advertisingSource;

        return $this;
    }

    /**
     * Gets as advertisingSourceCode.
     *
     * @return string
     */
    public function getAdvertisingSourceCode()
    {
        return $this->advertisingSourceCode;
    }

    /**
     * Sets a new advertisingSourceCode.
     *
     * @param string $advertisingSourceCode
     *
     * @return self
     */
    public function setAdvertisingSourceCode($advertisingSourceCode)
    {
        $this->advertisingSourceCode = $advertisingSourceCode;

        return $this;
    }

    /**
     * Gets as basePaymentAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBasePaymentAmount()
    {
        return $this->basePaymentAmount;
    }

    /**
     * Sets a new basePaymentAmount.
     *
     * @return self
     */
    public function setBasePaymentAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $basePaymentAmount)
    {
        $this->basePaymentAmount = $basePaymentAmount;

        return $this;
    }

    /**
     * Gets as baseVehicleGross.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBaseVehicleGross()
    {
        return $this->baseVehicleGross;
    }

    /**
     * Sets a new baseVehicleGross.
     *
     * @return self
     */
    public function setBaseVehicleGross(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseVehicleGross)
    {
        $this->baseVehicleGross = $baseVehicleGross;

        return $this;
    }

    /**
     * Gets as buy.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\BuyInfoType
     */
    public function getBuy()
    {
        return $this->buy;
    }

    /**
     * Sets a new buy.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\BuyInfoType $buy
     *
     * @return self
     */
    public function setBuy(BuyInfoType $buy)
    {
        $this->buy = $buy;

        return $this;
    }

    /**
     * Gets as buyRate.
     *
     * @return float
     */
    public function getBuyRate()
    {
        return $this->buyRate;
    }

    /**
     * Sets a new buyRate.
     *
     * @param float $buyRate
     *
     * @return self
     */
    public function setBuyRate($buyRate)
    {
        $this->buyRate = $buyRate;

        return $this;
    }

    /**
     * Gets as cashDownPayment.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCashDownPayment()
    {
        return $this->cashDownPayment;
    }

    /**
     * Sets a new cashDownPayment.
     *
     * @return self
     */
    public function setCashDownPayment(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cashDownPayment)
    {
        $this->cashDownPayment = $cashDownPayment;

        return $this;
    }

    /**
     * Gets as city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets a new city.
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Gets as cobuyer.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\CobuyerInfoType
     */
    public function getCobuyer()
    {
        return $this->cobuyer;
    }

    /**
     * Sets a new cobuyer.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\CobuyerInfoType $cobuyer
     *
     * @return self
     */
    public function setCobuyer(CobuyerInfoType $cobuyer)
    {
        $this->cobuyer = $cobuyer;

        return $this;
    }

    /**
     * Gets as contractDate.
     *
     * @return \DateTime
     */
    public function getContractDate()
    {
        return $this->contractDate;
    }

    /**
     * Sets a new contractDate.
     *
     * @return self
     */
    public function setContractDate(\DateTime $contractDate)
    {
        $this->contractDate = $contractDate;

        return $this;
    }

    /**
     * Adds as costAdd.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\CostAddType $costAdd
     */
    public function addToCostAdds(CostAddType $costAdd)
    {
        $this->costAdds[] = $costAdd;

        return $this;
    }

    /**
     * isset costAdds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCostAdds($index)
    {
        return isset($this->costAdds[$index]);
    }

    /**
     * unset costAdds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCostAdds($index)
    {
        unset($this->costAdds[$index]);
    }

    /**
     * Gets as costAdds.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\CostAddType[]
     */
    public function getCostAdds()
    {
        return $this->costAdds;
    }

    /**
     * Sets a new costAdds.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\CostAddType[] $costAdds
     *
     * @return self
     */
    public function setCostAdds(array $costAdds)
    {
        $this->costAdds = $costAdds;

        return $this;
    }

    /**
     * Gets as customerDriverLicense.
     *
     * @return \App\Soap\dealerbuilt\src\Models\DriversLicenseType
     */
    public function getCustomerDriverLicense()
    {
        return $this->customerDriverLicense;
    }

    /**
     * Sets a new customerDriverLicense.
     *
     * @return self
     */
    public function setCustomerDriverLicense(\App\Soap\dealerbuilt\src\Models\DriversLicenseType $customerDriverLicense)
    {
        $this->customerDriverLicense = $customerDriverLicense;

        return $this;
    }

    /**
     * Gets as customerType.
     *
     * @return string
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * Sets a new customerType.
     *
     * @param string $customerType
     *
     * @return self
     */
    public function setCustomerType($customerType)
    {
        $this->customerType = $customerType;

        return $this;
    }

    /**
     * Gets as customerTypeDetail.
     *
     * @return string
     */
    public function getCustomerTypeDetail()
    {
        return $this->customerTypeDetail;
    }

    /**
     * Sets a new customerTypeDetail.
     *
     * @param string $customerTypeDetail
     *
     * @return self
     */
    public function setCustomerTypeDetail($customerTypeDetail)
    {
        $this->customerTypeDetail = $customerTypeDetail;

        return $this;
    }

    /**
     * Gets as dateApproved.
     *
     * @return \DateTime
     */
    public function getDateApproved()
    {
        return $this->dateApproved;
    }

    /**
     * Sets a new dateApproved.
     *
     * @return self
     */
    public function setDateApproved(\DateTime $dateApproved)
    {
        $this->dateApproved = $dateApproved;

        return $this;
    }

    /**
     * Gets as dateCheckedOut.
     *
     * @return \DateTime
     */
    public function getDateCheckedOut()
    {
        return $this->dateCheckedOut;
    }

    /**
     * Sets a new dateCheckedOut.
     *
     * @return self
     */
    public function setDateCheckedOut(\DateTime $dateCheckedOut)
    {
        $this->dateCheckedOut = $dateCheckedOut;

        return $this;
    }

    /**
     * Gets as dateProcessed.
     *
     * @return \DateTime
     */
    public function getDateProcessed()
    {
        return $this->dateProcessed;
    }

    /**
     * Sets a new dateProcessed.
     *
     * @return self
     */
    public function setDateProcessed(\DateTime $dateProcessed)
    {
        $this->dateProcessed = $dateProcessed;

        return $this;
    }

    /**
     * Gets as dateSentToAccounting.
     *
     * @return \DateTime
     */
    public function getDateSentToAccounting()
    {
        return $this->dateSentToAccounting;
    }

    /**
     * Sets a new dateSentToAccounting.
     *
     * @return self
     */
    public function setDateSentToAccounting(\DateTime $dateSentToAccounting)
    {
        $this->dateSentToAccounting = $dateSentToAccounting;

        return $this;
    }

    /**
     * Gets as dateSold.
     *
     * @return \DateTime
     */
    public function getDateSold()
    {
        return $this->dateSold;
    }

    /**
     * Sets a new dateSold.
     *
     * @return self
     */
    public function setDateSold(\DateTime $dateSold)
    {
        $this->dateSold = $dateSold;

        return $this;
    }

    /**
     * Gets as daysToFirstPayment.
     *
     * @return int
     */
    public function getDaysToFirstPayment()
    {
        return $this->daysToFirstPayment;
    }

    /**
     * Sets a new daysToFirstPayment.
     *
     * @param int $daysToFirstPayment
     *
     * @return self
     */
    public function setDaysToFirstPayment($daysToFirstPayment)
    {
        $this->daysToFirstPayment = $daysToFirstPayment;

        return $this;
    }

    /**
     * Gets as dealNumber.
     *
     * @return int
     */
    public function getDealNumber()
    {
        return $this->dealNumber;
    }

    /**
     * Sets a new dealNumber.
     *
     * @param int $dealNumber
     *
     * @return self
     */
    public function setDealNumber($dealNumber)
    {
        $this->dealNumber = $dealNumber;

        return $this;
    }

    /**
     * Gets as dealPurchaseProgram.
     *
     * @return string
     */
    public function getDealPurchaseProgram()
    {
        return $this->dealPurchaseProgram;
    }

    /**
     * Sets a new dealPurchaseProgram.
     *
     * @param string $dealPurchaseProgram
     *
     * @return self
     */
    public function setDealPurchaseProgram($dealPurchaseProgram)
    {
        $this->dealPurchaseProgram = $dealPurchaseProgram;

        return $this;
    }

    /**
     * Gets as dealStatus.
     *
     * @return string
     */
    public function getDealStatus()
    {
        return $this->dealStatus;
    }

    /**
     * Sets a new dealStatus.
     *
     * @param string $dealStatus
     *
     * @return self
     */
    public function setDealStatus($dealStatus)
    {
        $this->dealStatus = $dealStatus;

        return $this;
    }

    /**
     * Adds as dealStatus.
     *
     * @return self
     *
     * @param string $dealStatus
     */
    public function addToDealStatusList($dealStatus)
    {
        $this->dealStatusList[] = $dealStatus;

        return $this;
    }

    /**
     * isset dealStatusList.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDealStatusList($index)
    {
        return isset($this->dealStatusList[$index]);
    }

    /**
     * unset dealStatusList.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDealStatusList($index)
    {
        unset($this->dealStatusList[$index]);
    }

    /**
     * Gets as dealStatusList.
     *
     * @return string[]
     */
    public function getDealStatusList()
    {
        return $this->dealStatusList;
    }

    /**
     * Sets a new dealStatusList.
     *
     * @param string $dealStatusList
     *
     * @return self
     */
    public function setDealStatusList(array $dealStatusList)
    {
        $this->dealStatusList = $dealStatusList;

        return $this;
    }

    /**
     * Gets as dealType.
     *
     * @return string
     */
    public function getDealType()
    {
        return $this->dealType;
    }

    /**
     * Sets a new dealType.
     *
     * @param string $dealType
     *
     * @return self
     */
    public function setDealType($dealType)
    {
        $this->dealType = $dealType;

        return $this;
    }

    /**
     * Gets as dealerRebateAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerRebateAmount()
    {
        return $this->dealerRebateAmount;
    }

    /**
     * Sets a new dealerRebateAmount.
     *
     * @return self
     */
    public function setDealerRebateAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerRebateAmount)
    {
        $this->dealerRebateAmount = $dealerRebateAmount;

        return $this;
    }

    /**
     * Gets as dealerState.
     *
     * @return string
     */
    public function getDealerState()
    {
        return $this->dealerState;
    }

    /**
     * Sets a new dealerState.
     *
     * @param string $dealerState
     *
     * @return self
     */
    public function setDealerState($dealerState)
    {
        $this->dealerState = $dealerState;

        return $this;
    }

    /**
     * Gets as dealerZip.
     *
     * @return string
     */
    public function getDealerZip()
    {
        return $this->dealerZip;
    }

    /**
     * Sets a new dealerZip.
     *
     * @param string $dealerZip
     *
     * @return self
     */
    public function setDealerZip($dealerZip)
    {
        $this->dealerZip = $dealerZip;

        return $this;
    }

    /**
     * Gets as decrLifePremium.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDecrLifePremium()
    {
        return $this->decrLifePremium;
    }

    /**
     * Sets a new decrLifePremium.
     *
     * @return self
     */
    public function setDecrLifePremium(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $decrLifePremium)
    {
        $this->decrLifePremium = $decrLifePremium;

        return $this;
    }

    /**
     * Gets as discountOtherTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDiscountOtherTotal()
    {
        return $this->discountOtherTotal;
    }

    /**
     * Sets a new discountOtherTotal.
     *
     * @return self
     */
    public function setDiscountOtherTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $discountOtherTotal)
    {
        $this->discountOtherTotal = $discountOtherTotal;

        return $this;
    }

    /**
     * Gets as downPayment.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDownPayment()
    {
        return $this->downPayment;
    }

    /**
     * Sets a new downPayment.
     *
     * @return self
     */
    public function setDownPayment(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $downPayment)
    {
        $this->downPayment = $downPayment;

        return $this;
    }

    /**
     * Gets as eventOccurrenceDateTime.
     *
     * @return \DateTime
     */
    public function getEventOccurrenceDateTime()
    {
        return $this->eventOccurrenceDateTime;
    }

    /**
     * Sets a new eventOccurrenceDateTime.
     *
     * @return self
     */
    public function setEventOccurrenceDateTime(\DateTime $eventOccurrenceDateTime)
    {
        $this->eventOccurrenceDateTime = $eventOccurrenceDateTime;

        return $this;
    }

    /**
     * Gets as feeAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * Sets a new feeAmount.
     *
     * @return self
     */
    public function setFeeAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $feeAmount)
    {
        $this->feeAmount = $feeAmount;

        return $this;
    }

    /**
     * Gets as finalAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFinalAmount()
    {
        return $this->finalAmount;
    }

    /**
     * Sets a new finalAmount.
     *
     * @return self
     */
    public function setFinalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $finalAmount)
    {
        $this->finalAmount = $finalAmount;

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
     * Gets as financeChargeAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFinanceChargeAmount()
    {
        return $this->financeChargeAmount;
    }

    /**
     * Sets a new financeChargeAmount.
     *
     * @return self
     */
    public function setFinanceChargeAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $financeChargeAmount)
    {
        $this->financeChargeAmount = $financeChargeAmount;

        return $this;
    }

    /**
     * Gets as financeDeptGross.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFinanceDeptGross()
    {
        return $this->financeDeptGross;
    }

    /**
     * Sets a new financeDeptGross.
     *
     * @return self
     */
    public function setFinanceDeptGross(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $financeDeptGross)
    {
        $this->financeDeptGross = $financeDeptGross;

        return $this;
    }

    /**
     * Gets as financeDeptGrossWithHoldback.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFinanceDeptGrossWithHoldback()
    {
        return $this->financeDeptGrossWithHoldback;
    }

    /**
     * Sets a new financeDeptGrossWithHoldback.
     *
     * @return self
     */
    public function setFinanceDeptGrossWithHoldback(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $financeDeptGrossWithHoldback)
    {
        $this->financeDeptGrossWithHoldback = $financeDeptGrossWithHoldback;

        return $this;
    }

    /**
     * Adds as numberedPersonInfo.
     *
     * @return self
     */
    public function addToFinanceManagers(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $numberedPersonInfo)
    {
        $this->financeManagers[] = $numberedPersonInfo;

        return $this;
    }

    /**
     * isset financeManagers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetFinanceManagers($index)
    {
        return isset($this->financeManagers[$index]);
    }

    /**
     * unset financeManagers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetFinanceManagers($index)
    {
        unset($this->financeManagers[$index]);
    }

    /**
     * Gets as financeManagers.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    public function getFinanceManagers()
    {
        return $this->financeManagers;
    }

    /**
     * Sets a new financeManagers.
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[] $financeManagers
     *
     * @return self
     */
    public function setFinanceManagers(array $financeManagers)
    {
        $this->financeManagers = $financeManagers;

        return $this;
    }

    /**
     * Gets as financeReserve.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFinanceReserve()
    {
        return $this->financeReserve;
    }

    /**
     * Sets a new financeReserve.
     *
     * @return self
     */
    public function setFinanceReserve(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $financeReserve)
    {
        $this->financeReserve = $financeReserve;

        return $this;
    }

    /**
     * Gets as firstPaymentDate.
     *
     * @return \DateTime
     */
    public function getFirstPaymentDate()
    {
        return $this->firstPaymentDate;
    }

    /**
     * Sets a new firstPaymentDate.
     *
     * @return self
     */
    public function setFirstPaymentDate(\DateTime $firstPaymentDate)
    {
        $this->firstPaymentDate = $firstPaymentDate;

        return $this;
    }

    /**
     * Gets as fleetAccountString.
     *
     * @return string
     */
    public function getFleetAccountString()
    {
        return $this->fleetAccountString;
    }

    /**
     * Sets a new fleetAccountString.
     *
     * @param string $fleetAccountString
     *
     * @return self
     */
    public function setFleetAccountString($fleetAccountString)
    {
        $this->fleetAccountString = $fleetAccountString;

        return $this;
    }

    /**
     * Gets as grossSellingPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getGrossSellingPrice()
    {
        return $this->grossSellingPrice;
    }

    /**
     * Sets a new grossSellingPrice.
     *
     * @return self
     */
    public function setGrossSellingPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $grossSellingPrice)
    {
        $this->grossSellingPrice = $grossSellingPrice;

        return $this;
    }

    /**
     * Adds as hardAdd.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\HardAddType $hardAdd
     */
    public function addToHardAdds(HardAddType $hardAdd)
    {
        $this->hardAdds[] = $hardAdd;

        return $this;
    }

    /**
     * isset hardAdds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetHardAdds($index)
    {
        return isset($this->hardAdds[$index]);
    }

    /**
     * unset hardAdds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetHardAdds($index)
    {
        unset($this->hardAdds[$index]);
    }

    /**
     * Gets as hardAdds.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\HardAddType[]
     */
    public function getHardAdds()
    {
        return $this->hardAdds;
    }

    /**
     * Sets a new hardAdds.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\HardAddType[] $hardAdds
     *
     * @return self
     */
    public function setHardAdds(array $hardAdds)
    {
        $this->hardAdds = $hardAdds;

        return $this;
    }

    /**
     * Gets as hardAddsTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getHardAddsTotal()
    {
        return $this->hardAddsTotal;
    }

    /**
     * Sets a new hardAddsTotal.
     *
     * @return self
     */
    public function setHardAddsTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $hardAddsTotal)
    {
        $this->hardAddsTotal = $hardAddsTotal;

        return $this;
    }

    /**
     * Adds as incentive.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType $incentive
     */
    public function addToIncentives(IncentiveType $incentive)
    {
        $this->incentives[] = $incentive;

        return $this;
    }

    /**
     * isset incentives.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetIncentives($index)
    {
        return isset($this->incentives[$index]);
    }

    /**
     * unset incentives.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetIncentives($index)
    {
        unset($this->incentives[$index]);
    }

    /**
     * Gets as incentives.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType[]
     */
    public function getIncentives()
    {
        return $this->incentives;
    }

    /**
     * Sets a new incentives.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType[] $incentives
     *
     * @return self
     */
    public function setIncentives(array $incentives)
    {
        $this->incentives = $incentives;

        return $this;
    }

    /**
     * Gets as incentivesTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getIncentivesTotal()
    {
        return $this->incentivesTotal;
    }

    /**
     * Sets a new incentivesTotal.
     *
     * @return self
     */
    public function setIncentivesTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $incentivesTotal)
    {
        $this->incentivesTotal = $incentivesTotal;

        return $this;
    }

    /**
     * Adds as insuranceProduct.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType $insuranceProduct
     */
    public function addToInsuranceProducts(InsuranceProductType $insuranceProduct)
    {
        $this->insuranceProducts[] = $insuranceProduct;

        return $this;
    }

    /**
     * isset insuranceProducts.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetInsuranceProducts($index)
    {
        return isset($this->insuranceProducts[$index]);
    }

    /**
     * unset insuranceProducts.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetInsuranceProducts($index)
    {
        unset($this->insuranceProducts[$index]);
    }

    /**
     * Gets as insuranceProducts.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType[]
     */
    public function getInsuranceProducts()
    {
        return $this->insuranceProducts;
    }

    /**
     * Sets a new insuranceProducts.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType[] $insuranceProducts
     *
     * @return self
     */
    public function setInsuranceProducts(array $insuranceProducts)
    {
        $this->insuranceProducts = $insuranceProducts;

        return $this;
    }

    /**
     * Gets as interestDays.
     *
     * @return int
     */
    public function getInterestDays()
    {
        return $this->interestDays;
    }

    /**
     * Sets a new interestDays.
     *
     * @param int $interestDays
     *
     * @return self
     */
    public function setInterestDays($interestDays)
    {
        $this->interestDays = $interestDays;

        return $this;
    }

    /**
     * Gets as isApproved.
     *
     * @return bool
     */
    public function getIsApproved()
    {
        return $this->isApproved;
    }

    /**
     * Sets a new isApproved.
     *
     * @param bool $isApproved
     *
     * @return self
     */
    public function setIsApproved($isApproved)
    {
        $this->isApproved = $isApproved;

        return $this;
    }

    /**
     * Gets as isCheckedOut.
     *
     * @return bool
     */
    public function getIsCheckedOut()
    {
        return $this->isCheckedOut;
    }

    /**
     * Sets a new isCheckedOut.
     *
     * @param bool $isCheckedOut
     *
     * @return self
     */
    public function setIsCheckedOut($isCheckedOut)
    {
        $this->isCheckedOut = $isCheckedOut;

        return $this;
    }

    /**
     * Gets as isProcessed.
     *
     * @return bool
     */
    public function getIsProcessed()
    {
        return $this->isProcessed;
    }

    /**
     * Sets a new isProcessed.
     *
     * @param bool $isProcessed
     *
     * @return self
     */
    public function setIsProcessed($isProcessed)
    {
        $this->isProcessed = $isProcessed;

        return $this;
    }

    /**
     * Gets as isSentToAccounting.
     *
     * @return bool
     */
    public function getIsSentToAccounting()
    {
        return $this->isSentToAccounting;
    }

    /**
     * Sets a new isSentToAccounting.
     *
     * @param bool $isSentToAccounting
     *
     * @return self
     */
    public function setIsSentToAccounting($isSentToAccounting)
    {
        $this->isSentToAccounting = $isSentToAccounting;

        return $this;
    }

    /**
     * Gets as isSold.
     *
     * @return bool
     */
    public function getIsSold()
    {
        return $this->isSold;
    }

    /**
     * Sets a new isSold.
     *
     * @param bool $isSold
     *
     * @return self
     */
    public function setIsSold($isSold)
    {
        $this->isSold = $isSold;

        return $this;
    }

    /**
     * Gets as lease.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\LeaseInfoType
     */
    public function getLease()
    {
        return $this->lease;
    }

    /**
     * Sets a new lease.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\LeaseInfoType $lease
     *
     * @return self
     */
    public function setLease(LeaseInfoType $lease)
    {
        $this->lease = $lease;

        return $this;
    }

    /**
     * Gets as leasePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLeasePrice()
    {
        return $this->leasePrice;
    }

    /**
     * Sets a new leasePrice.
     *
     * @return self
     */
    public function setLeasePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $leasePrice)
    {
        $this->leasePrice = $leasePrice;

        return $this;
    }

    /**
     * Gets as leaseRateMoneyFactorString.
     *
     * @return string
     */
    public function getLeaseRateMoneyFactorString()
    {
        return $this->leaseRateMoneyFactorString;
    }

    /**
     * Sets a new leaseRateMoneyFactorString.
     *
     * @param string $leaseRateMoneyFactorString
     *
     * @return self
     */
    public function setLeaseRateMoneyFactorString($leaseRateMoneyFactorString)
    {
        $this->leaseRateMoneyFactorString = $leaseRateMoneyFactorString;

        return $this;
    }

    /**
     * Gets as lenderAddress.
     *
     * @return string
     */
    public function getLenderAddress()
    {
        return $this->lenderAddress;
    }

    /**
     * Sets a new lenderAddress.
     *
     * @param string $lenderAddress
     *
     * @return self
     */
    public function setLenderAddress($lenderAddress)
    {
        $this->lenderAddress = $lenderAddress;

        return $this;
    }

    /**
     * Gets as lenderCity.
     *
     * @return string
     */
    public function getLenderCity()
    {
        return $this->lenderCity;
    }

    /**
     * Sets a new lenderCity.
     *
     * @param string $lenderCity
     *
     * @return self
     */
    public function setLenderCity($lenderCity)
    {
        $this->lenderCity = $lenderCity;

        return $this;
    }

    /**
     * Gets as lenderCode.
     *
     * @return string
     */
    public function getLenderCode()
    {
        return $this->lenderCode;
    }

    /**
     * Sets a new lenderCode.
     *
     * @param string $lenderCode
     *
     * @return self
     */
    public function setLenderCode($lenderCode)
    {
        $this->lenderCode = $lenderCode;

        return $this;
    }

    /**
     * Gets as lenderDealerNumber.
     *
     * @return string
     */
    public function getLenderDealerNumber()
    {
        return $this->lenderDealerNumber;
    }

    /**
     * Sets a new lenderDealerNumber.
     *
     * @param string $lenderDealerNumber
     *
     * @return self
     */
    public function setLenderDealerNumber($lenderDealerNumber)
    {
        $this->lenderDealerNumber = $lenderDealerNumber;

        return $this;
    }

    /**
     * Gets as lenderFedSSN.
     *
     * @return string
     */
    public function getLenderFedSSN()
    {
        return $this->lenderFedSSN;
    }

    /**
     * Sets a new lenderFedSSN.
     *
     * @param string $lenderFedSSN
     *
     * @return self
     */
    public function setLenderFedSSN($lenderFedSSN)
    {
        $this->lenderFedSSN = $lenderFedSSN;

        return $this;
    }

    /**
     * Gets as lenderName.
     *
     * @return string
     */
    public function getLenderName()
    {
        return $this->lenderName;
    }

    /**
     * Sets a new lenderName.
     *
     * @param string $lenderName
     *
     * @return self
     */
    public function setLenderName($lenderName)
    {
        $this->lenderName = $lenderName;

        return $this;
    }

    /**
     * Gets as lenderPhone.
     *
     * @return \App\Soap\dealerbuilt\src\Models\PhoneNumberType
     */
    public function getLenderPhone()
    {
        return $this->lenderPhone;
    }

    /**
     * Sets a new lenderPhone.
     *
     * @return self
     */
    public function setLenderPhone(\App\Soap\dealerbuilt\src\Models\PhoneNumberType $lenderPhone)
    {
        $this->lenderPhone = $lenderPhone;

        return $this;
    }

    /**
     * Gets as lenderRemitTileName.
     *
     * @return string
     */
    public function getLenderRemitTileName()
    {
        return $this->lenderRemitTileName;
    }

    /**
     * Sets a new lenderRemitTileName.
     *
     * @param string $lenderRemitTileName
     *
     * @return self
     */
    public function setLenderRemitTileName($lenderRemitTileName)
    {
        $this->lenderRemitTileName = $lenderRemitTileName;

        return $this;
    }

    /**
     * Gets as lenderRemitTitleAddress.
     *
     * @return string
     */
    public function getLenderRemitTitleAddress()
    {
        return $this->lenderRemitTitleAddress;
    }

    /**
     * Sets a new lenderRemitTitleAddress.
     *
     * @param string $lenderRemitTitleAddress
     *
     * @return self
     */
    public function setLenderRemitTitleAddress($lenderRemitTitleAddress)
    {
        $this->lenderRemitTitleAddress = $lenderRemitTitleAddress;

        return $this;
    }

    /**
     * Gets as lenderRemitTitleCity.
     *
     * @return string
     */
    public function getLenderRemitTitleCity()
    {
        return $this->lenderRemitTitleCity;
    }

    /**
     * Sets a new lenderRemitTitleCity.
     *
     * @param string $lenderRemitTitleCity
     *
     * @return self
     */
    public function setLenderRemitTitleCity($lenderRemitTitleCity)
    {
        $this->lenderRemitTitleCity = $lenderRemitTitleCity;

        return $this;
    }

    /**
     * Gets as lenderRemitTitleName.
     *
     * @return string
     */
    public function getLenderRemitTitleName()
    {
        return $this->lenderRemitTitleName;
    }

    /**
     * Sets a new lenderRemitTitleName.
     *
     * @param string $lenderRemitTitleName
     *
     * @return self
     */
    public function setLenderRemitTitleName($lenderRemitTitleName)
    {
        $this->lenderRemitTitleName = $lenderRemitTitleName;

        return $this;
    }

    /**
     * Gets as lenderRemitTitleState.
     *
     * @return string
     */
    public function getLenderRemitTitleState()
    {
        return $this->lenderRemitTitleState;
    }

    /**
     * Sets a new lenderRemitTitleState.
     *
     * @param string $lenderRemitTitleState
     *
     * @return self
     */
    public function setLenderRemitTitleState($lenderRemitTitleState)
    {
        $this->lenderRemitTitleState = $lenderRemitTitleState;

        return $this;
    }

    /**
     * Gets as lenderRemitTitleZip.
     *
     * @return string
     */
    public function getLenderRemitTitleZip()
    {
        return $this->lenderRemitTitleZip;
    }

    /**
     * Sets a new lenderRemitTitleZip.
     *
     * @param string $lenderRemitTitleZip
     *
     * @return self
     */
    public function setLenderRemitTitleZip($lenderRemitTitleZip)
    {
        $this->lenderRemitTitleZip = $lenderRemitTitleZip;

        return $this;
    }

    /**
     * Gets as lenderState.
     *
     * @return string
     */
    public function getLenderState()
    {
        return $this->lenderState;
    }

    /**
     * Sets a new lenderState.
     *
     * @param string $lenderState
     *
     * @return self
     */
    public function setLenderState($lenderState)
    {
        $this->lenderState = $lenderState;

        return $this;
    }

    /**
     * Gets as lenderZip.
     *
     * @return string
     */
    public function getLenderZip()
    {
        return $this->lenderZip;
    }

    /**
     * Sets a new lenderZip.
     *
     * @param string $lenderZip
     *
     * @return self
     */
    public function setLenderZip($lenderZip)
    {
        $this->lenderZip = $lenderZip;

        return $this;
    }

    /**
     * Gets as manufacturerRebateAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getManufacturerRebateAmount()
    {
        return $this->manufacturerRebateAmount;
    }

    /**
     * Sets a new manufacturerRebateAmount.
     *
     * @return self
     */
    public function setManufacturerRebateAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $manufacturerRebateAmount)
    {
        $this->manufacturerRebateAmount = $manufacturerRebateAmount;

        return $this;
    }

    /**
     * Gets as maturityDateYearMonthDate.
     *
     * @return \DateTime
     */
    public function getMaturityDateYearMonthDate()
    {
        return $this->maturityDateYearMonthDate;
    }

    /**
     * Sets a new maturityDateYearMonthDate.
     *
     * @return self
     */
    public function setMaturityDateYearMonthDate(\DateTime $maturityDateYearMonthDate)
    {
        $this->maturityDateYearMonthDate = $maturityDateYearMonthDate;

        return $this;
    }

    /**
     * Gets as milesAtSaleDate.
     *
     * @return int
     */
    public function getMilesAtSaleDate()
    {
        return $this->milesAtSaleDate;
    }

    /**
     * Sets a new milesAtSaleDate.
     *
     * @param int $milesAtSaleDate
     *
     * @return self
     */
    public function setMilesAtSaleDate($milesAtSaleDate)
    {
        $this->milesAtSaleDate = $milesAtSaleDate;

        return $this;
    }

    /**
     * Gets as mrm.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMrm()
    {
        return $this->mrm;
    }

    /**
     * Sets a new mrm.
     *
     * @return self
     */
    public function setMrm(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $mrm)
    {
        $this->mrm = $mrm;

        return $this;
    }

    /**
     * Gets as msrp.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMsrp()
    {
        return $this->msrp;
    }

    /**
     * Sets a new msrp.
     *
     * @return self
     */
    public function setMsrp(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrp)
    {
        $this->msrp = $msrp;

        return $this;
    }

    /**
     * Gets as netAmountFinanced.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getNetAmountFinanced()
    {
        return $this->netAmountFinanced;
    }

    /**
     * Sets a new netAmountFinanced.
     *
     * @return self
     */
    public function setNetAmountFinanced(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $netAmountFinanced)
    {
        $this->netAmountFinanced = $netAmountFinanced;

        return $this;
    }

    /**
     * Gets as netAnnualPercentageRate.
     *
     * @return float
     */
    public function getNetAnnualPercentageRate()
    {
        return $this->netAnnualPercentageRate;
    }

    /**
     * Sets a new netAnnualPercentageRate.
     *
     * @param float $netAnnualPercentageRate
     *
     * @return self
     */
    public function setNetAnnualPercentageRate($netAnnualPercentageRate)
    {
        $this->netAnnualPercentageRate = $netAnnualPercentageRate;

        return $this;
    }

    /**
     * Gets as netCapitalizedCostAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getNetCapitalizedCostAmount()
    {
        return $this->netCapitalizedCostAmount;
    }

    /**
     * Sets a new netCapitalizedCostAmount.
     *
     * @return self
     */
    public function setNetCapitalizedCostAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $netCapitalizedCostAmount)
    {
        $this->netCapitalizedCostAmount = $netCapitalizedCostAmount;

        return $this;
    }

    /**
     * Gets as netTradeAllowance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getNetTradeAllowance()
    {
        return $this->netTradeAllowance;
    }

    /**
     * Sets a new netTradeAllowance.
     *
     * @return self
     */
    public function setNetTradeAllowance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $netTradeAllowance)
    {
        $this->netTradeAllowance = $netTradeAllowance;

        return $this;
    }

    /**
     * Gets as netTradeAllowanceAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getNetTradeAllowanceAmount()
    {
        return $this->netTradeAllowanceAmount;
    }

    /**
     * Sets a new netTradeAllowanceAmount.
     *
     * @return self
     */
    public function setNetTradeAllowanceAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $netTradeAllowanceAmount)
    {
        $this->netTradeAllowanceAmount = $netTradeAllowanceAmount;

        return $this;
    }

    /**
     * Gets as numberOfPaymentsNumeric.
     *
     * @return float
     */
    public function getNumberOfPaymentsNumeric()
    {
        return $this->numberOfPaymentsNumeric;
    }

    /**
     * Sets a new numberOfPaymentsNumeric.
     *
     * @param float $numberOfPaymentsNumeric
     *
     * @return self
     */
    public function setNumberOfPaymentsNumeric($numberOfPaymentsNumeric)
    {
        $this->numberOfPaymentsNumeric = $numberOfPaymentsNumeric;

        return $this;
    }

    /**
     * Gets as otherDeptGross.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getOtherDeptGross()
    {
        return $this->otherDeptGross;
    }

    /**
     * Sets a new otherDeptGross.
     *
     * @return self
     */
    public function setOtherDeptGross(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $otherDeptGross)
    {
        $this->otherDeptGross = $otherDeptGross;

        return $this;
    }

    /**
     * Gets as otherDeptGrossWithHoldback.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getOtherDeptGrossWithHoldback()
    {
        return $this->otherDeptGrossWithHoldback;
    }

    /**
     * Sets a new otherDeptGrossWithHoldback.
     *
     * @return self
     */
    public function setOtherDeptGrossWithHoldback(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $otherDeptGrossWithHoldback)
    {
        $this->otherDeptGrossWithHoldback = $otherDeptGrossWithHoldback;

        return $this;
    }

    /**
     * Gets as paymentCount.
     *
     * @return int
     */
    public function getPaymentCount()
    {
        return $this->paymentCount;
    }

    /**
     * Sets a new paymentCount.
     *
     * @param int $paymentCount
     *
     * @return self
     */
    public function setPaymentCount($paymentCount)
    {
        $this->paymentCount = $paymentCount;

        return $this;
    }

    /**
     * Gets as prepaidFinanceChargeAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPrepaidFinanceChargeAmount()
    {
        return $this->prepaidFinanceChargeAmount;
    }

    /**
     * Sets a new prepaidFinanceChargeAmount.
     *
     * @return self
     */
    public function setPrepaidFinanceChargeAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $prepaidFinanceChargeAmount)
    {
        $this->prepaidFinanceChargeAmount = $prepaidFinanceChargeAmount;

        return $this;
    }

    /**
     * Adds as pullProduct.
     *
     * @return self
     */
    public function addToProductDetails(\App\Soap\dealerbuilt\src\Models\PullProductType $pullProduct)
    {
        $this->productDetails[] = $pullProduct;

        return $this;
    }

    /**
     * isset productDetails.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetProductDetails($index)
    {
        return isset($this->productDetails[$index]);
    }

    /**
     * unset productDetails.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetProductDetails($index)
    {
        unset($this->productDetails[$index]);
    }

    /**
     * Gets as productDetails.
     *
     * @return \App\Soap\dealerbuilt\src\Models\PullProductType[]
     */
    public function getProductDetails()
    {
        return $this->productDetails;
    }

    /**
     * Sets a new productDetails.
     *
     * @param \App\Soap\dealerbuilt\src\Models\PullProductType[] $productDetails
     *
     * @return self
     */
    public function setProductDetails(array $productDetails)
    {
        $this->productDetails = $productDetails;

        return $this;
    }

    /**
     * Adds as protectionPackage.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType $protectionPackage
     */
    public function addToProtectionPackages(ProtectionPackageType $protectionPackage)
    {
        $this->protectionPackages[] = $protectionPackage;

        return $this;
    }

    /**
     * isset protectionPackages.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetProtectionPackages($index)
    {
        return isset($this->protectionPackages[$index]);
    }

    /**
     * unset protectionPackages.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetProtectionPackages($index)
    {
        unset($this->protectionPackages[$index]);
    }

    /**
     * Gets as protectionPackages.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[]
     */
    public function getProtectionPackages()
    {
        return $this->protectionPackages;
    }

    /**
     * Sets a new protectionPackages.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[] $protectionPackages
     *
     * @return self
     */
    public function setProtectionPackages(array $protectionPackages)
    {
        $this->protectionPackages = $protectionPackages;

        return $this;
    }

    /**
     * Gets as purchasePriceAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPurchasePriceAmount()
    {
        return $this->purchasePriceAmount;
    }

    /**
     * Sets a new purchasePriceAmount.
     *
     * @return self
     */
    public function setPurchasePriceAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $purchasePriceAmount)
    {
        $this->purchasePriceAmount = $purchasePriceAmount;

        return $this;
    }

    /**
     * Gets as rate.
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Sets a new rate.
     *
     * @param float $rate
     *
     * @return self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Adds as rebate.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\RebateType $rebate
     */
    public function addToRebates(RebateType $rebate)
    {
        $this->rebates[] = $rebate;

        return $this;
    }

    /**
     * isset rebates.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRebates($index)
    {
        return isset($this->rebates[$index]);
    }

    /**
     * unset rebates.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRebates($index)
    {
        unset($this->rebates[$index]);
    }

    /**
     * Gets as rebates.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\RebateType[]
     */
    public function getRebates()
    {
        return $this->rebates;
    }

    /**
     * Sets a new rebates.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\RebateType[] $rebates
     *
     * @return self
     */
    public function setRebates(array $rebates)
    {
        $this->rebates = $rebates;

        return $this;
    }

    /**
     * Gets as rebatesTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRebatesTotal()
    {
        return $this->rebatesTotal;
    }

    /**
     * Sets a new rebatesTotal.
     *
     * @return self
     */
    public function setRebatesTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $rebatesTotal)
    {
        $this->rebatesTotal = $rebatesTotal;

        return $this;
    }

    /**
     * Gets as regularPayment.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRegularPayment()
    {
        return $this->regularPayment;
    }

    /**
     * Sets a new regularPayment.
     *
     * @return self
     */
    public function setRegularPayment(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $regularPayment)
    {
        $this->regularPayment = $regularPayment;

        return $this;
    }

    /**
     * Gets as residualAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getResidualAmount()
    {
        return $this->residualAmount;
    }

    /**
     * Sets a new residualAmount.
     *
     * @return self
     */
    public function setResidualAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $residualAmount)
    {
        $this->residualAmount = $residualAmount;

        return $this;
    }

    /**
     * Gets as saleCategoryString.
     *
     * @return string
     */
    public function getSaleCategoryString()
    {
        return $this->saleCategoryString;
    }

    /**
     * Sets a new saleCategoryString.
     *
     * @param string $saleCategoryString
     *
     * @return self
     */
    public function setSaleCategoryString($saleCategoryString)
    {
        $this->saleCategoryString = $saleCategoryString;

        return $this;
    }

    /**
     * Gets as salesDeptGross.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSalesDeptGross()
    {
        return $this->salesDeptGross;
    }

    /**
     * Sets a new salesDeptGross.
     *
     * @return self
     */
    public function setSalesDeptGross(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $salesDeptGross)
    {
        $this->salesDeptGross = $salesDeptGross;

        return $this;
    }

    /**
     * Gets as salesDeptGrossWithHoldback.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSalesDeptGrossWithHoldback()
    {
        return $this->salesDeptGrossWithHoldback;
    }

    /**
     * Sets a new salesDeptGrossWithHoldback.
     *
     * @return self
     */
    public function setSalesDeptGrossWithHoldback(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $salesDeptGrossWithHoldback)
    {
        $this->salesDeptGrossWithHoldback = $salesDeptGrossWithHoldback;

        return $this;
    }

    /**
     * Adds as numberedPersonInfo.
     *
     * @return self
     */
    public function addToSalesGeneralManager(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $numberedPersonInfo)
    {
        $this->salesGeneralManager[] = $numberedPersonInfo;

        return $this;
    }

    /**
     * isset salesGeneralManager.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSalesGeneralManager($index)
    {
        return isset($this->salesGeneralManager[$index]);
    }

    /**
     * unset salesGeneralManager.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSalesGeneralManager($index)
    {
        unset($this->salesGeneralManager[$index]);
    }

    /**
     * Gets as salesGeneralManager.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    public function getSalesGeneralManager()
    {
        return $this->salesGeneralManager;
    }

    /**
     * Sets a new salesGeneralManager.
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[] $salesGeneralManager
     *
     * @return self
     */
    public function setSalesGeneralManager(array $salesGeneralManager)
    {
        $this->salesGeneralManager = $salesGeneralManager;

        return $this;
    }

    /**
     * Gets as salesManager.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getSalesManager()
    {
        return $this->salesManager;
    }

    /**
     * Sets a new salesManager.
     *
     * @return self
     */
    public function setSalesManager(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $salesManager)
    {
        $this->salesManager = $salesManager;

        return $this;
    }

    /**
     * Gets as salesNumber.
     *
     * @return string
     */
    public function getSalesNumber()
    {
        return $this->salesNumber;
    }

    /**
     * Sets a new salesNumber.
     *
     * @param string $salesNumber
     *
     * @return self
     */
    public function setSalesNumber($salesNumber)
    {
        $this->salesNumber = $salesNumber;

        return $this;
    }

    /**
     * Gets as salesNumber2.
     *
     * @return string
     */
    public function getSalesNumber2()
    {
        return $this->salesNumber2;
    }

    /**
     * Sets a new salesNumber2.
     *
     * @param string $salesNumber2
     *
     * @return self
     */
    public function setSalesNumber2($salesNumber2)
    {
        $this->salesNumber2 = $salesNumber2;

        return $this;
    }

    /**
     * Adds as numberedPersonInfo.
     *
     * @return self
     */
    public function addToSalesPeople(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $numberedPersonInfo)
    {
        $this->salesPeople[] = $numberedPersonInfo;

        return $this;
    }

    /**
     * isset salesPeople.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSalesPeople($index)
    {
        return isset($this->salesPeople[$index]);
    }

    /**
     * unset salesPeople.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSalesPeople($index)
    {
        unset($this->salesPeople[$index]);
    }

    /**
     * Gets as salesPeople.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[]
     */
    public function getSalesPeople()
    {
        return $this->salesPeople;
    }

    /**
     * Sets a new salesPeople.
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType[] $salesPeople
     *
     * @return self
     */
    public function setSalesPeople(array $salesPeople)
    {
        $this->salesPeople = $salesPeople;

        return $this;
    }

    /**
     * Gets as securityDepositAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSecurityDepositAmount()
    {
        return $this->securityDepositAmount;
    }

    /**
     * Sets a new securityDepositAmount.
     *
     * @return self
     */
    public function setSecurityDepositAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $securityDepositAmount)
    {
        $this->securityDepositAmount = $securityDepositAmount;

        return $this;
    }

    /**
     * Gets as sellingPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSellingPrice()
    {
        return $this->sellingPrice;
    }

    /**
     * Sets a new sellingPrice.
     *
     * @return self
     */
    public function setSellingPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $sellingPrice)
    {
        $this->sellingPrice = $sellingPrice;

        return $this;
    }

    /**
     * Adds as serviceContract.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType $serviceContract
     */
    public function addToServiceContracts(ServiceContractType $serviceContract)
    {
        $this->serviceContracts[] = $serviceContract;

        return $this;
    }

    /**
     * isset serviceContracts.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceContracts($index)
    {
        return isset($this->serviceContracts[$index]);
    }

    /**
     * unset serviceContracts.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceContracts($index)
    {
        unset($this->serviceContracts[$index]);
    }

    /**
     * Gets as serviceContracts.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType[]
     */
    public function getServiceContracts()
    {
        return $this->serviceContracts;
    }

    /**
     * Sets a new serviceContracts.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType[] $serviceContracts
     *
     * @return self
     */
    public function setServiceContracts(array $serviceContracts)
    {
        $this->serviceContracts = $serviceContracts;

        return $this;
    }

    /**
     * Adds as softAdd.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType $softAdd
     */
    public function addToSoftAdds(SoftAddType $softAdd)
    {
        $this->softAdds[] = $softAdd;

        return $this;
    }

    /**
     * isset softAdds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSoftAdds($index)
    {
        return isset($this->softAdds[$index]);
    }

    /**
     * unset softAdds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSoftAdds($index)
    {
        unset($this->softAdds[$index]);
    }

    /**
     * Gets as softAdds.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType[]
     */
    public function getSoftAdds()
    {
        return $this->softAdds;
    }

    /**
     * Sets a new softAdds.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType[] $softAdds
     *
     * @return self
     */
    public function setSoftAdds(array $softAdds)
    {
        $this->softAdds = $softAdds;

        return $this;
    }

    /**
     * Gets as taxAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * Sets a new taxAmount.
     *
     * @return self
     */
    public function setTaxAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount)
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * Gets as taxableSalesAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTaxableSalesAmount()
    {
        return $this->taxableSalesAmount;
    }

    /**
     * Sets a new taxableSalesAmount.
     *
     * @return self
     */
    public function setTaxableSalesAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxableSalesAmount)
    {
        $this->taxableSalesAmount = $taxableSalesAmount;

        return $this;
    }

    /**
     * Adds as dealerTax.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType $dealerTax
     */
    public function addToTaxes(DealerTaxType $dealerTax)
    {
        $this->taxes[] = $dealerTax;

        return $this;
    }

    /**
     * isset taxes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetTaxes($index)
    {
        return isset($this->taxes[$index]);
    }

    /**
     * unset taxes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetTaxes($index)
    {
        unset($this->taxes[$index]);
    }

    /**
     * Gets as taxes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[]
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * Sets a new taxes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[] $taxes
     *
     * @return self
     */
    public function setTaxes(array $taxes)
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * Gets as temporaryTag.
     *
     * @return string
     */
    public function getTemporaryTag()
    {
        return $this->temporaryTag;
    }

    /**
     * Sets a new temporaryTag.
     *
     * @param string $temporaryTag
     *
     * @return self
     */
    public function setTemporaryTag($temporaryTag)
    {
        $this->temporaryTag = $temporaryTag;

        return $this;
    }

    /**
     * Gets as termMonths.
     *
     * @return int
     */
    public function getTermMonths()
    {
        return $this->termMonths;
    }

    /**
     * Sets a new termMonths.
     *
     * @param int $termMonths
     *
     * @return self
     */
    public function setTermMonths($termMonths)
    {
        $this->termMonths = $termMonths;

        return $this;
    }

    /**
     * Gets as totalDownPayment.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalDownPayment()
    {
        return $this->totalDownPayment;
    }

    /**
     * Sets a new totalDownPayment.
     *
     * @return self
     */
    public function setTotalDownPayment(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalDownPayment)
    {
        $this->totalDownPayment = $totalDownPayment;

        return $this;
    }

    /**
     * Gets as totalOfPayments.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalOfPayments()
    {
        return $this->totalOfPayments;
    }

    /**
     * Sets a new totalOfPayments.
     *
     * @return self
     */
    public function setTotalOfPayments(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalOfPayments)
    {
        $this->totalOfPayments = $totalOfPayments;

        return $this;
    }

    /**
     * Gets as totalReductionsAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalReductionsAmount()
    {
        return $this->totalReductionsAmount;
    }

    /**
     * Sets a new totalReductionsAmount.
     *
     * @return self
     */
    public function setTotalReductionsAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalReductionsAmount)
    {
        $this->totalReductionsAmount = $totalReductionsAmount;

        return $this;
    }

    /**
     * Gets as totalTradeAllowance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalTradeAllowance()
    {
        return $this->totalTradeAllowance;
    }

    /**
     * Sets a new totalTradeAllowance.
     *
     * @return self
     */
    public function setTotalTradeAllowance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalTradeAllowance)
    {
        $this->totalTradeAllowance = $totalTradeAllowance;

        return $this;
    }

    /**
     * Gets as transactionPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTransactionPrice()
    {
        return $this->transactionPrice;
    }

    /**
     * Sets a new transactionPrice.
     *
     * @return self
     */
    public function setTransactionPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $transactionPrice)
    {
        $this->transactionPrice = $transactionPrice;

        return $this;
    }

    /**
     * Gets as updateStamp.
     *
     * @return \DateTime
     */
    public function getUpdateStamp()
    {
        return $this->updateStamp;
    }

    /**
     * Sets a new updateStamp.
     *
     * @return self
     */
    public function setUpdateStamp(\DateTime $updateStamp)
    {
        $this->updateStamp = $updateStamp;

        return $this;
    }

    /**
     * Gets as upsource.
     *
     * @return string
     */
    public function getUpsource()
    {
        return $this->upsource;
    }

    /**
     * Sets a new upsource.
     *
     * @param string $upsource
     *
     * @return self
     */
    public function setUpsource($upsource)
    {
        $this->upsource = $upsource;

        return $this;
    }

    /**
     * Gets as vehicleType.
     *
     * @return string
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * Sets a new vehicleType.
     *
     * @param string $vehicleType
     *
     * @return self
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }
}
