<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DealPushRequestType.
 *
 * XSD Type: DealPushRequest
 */
class DealPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $baseResidualAmount = null;

    /**
     * @var float
     */
    private $buyRate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cashDownPayment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\CobuyerInfoType
     */
    private $cobuyer = null;

    /**
     * @var \DateTime
     */
    private $contractDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\DriversLicenseType
     */
    private $customerDriverLicense = null;

    /**
     * @var int
     */
    private $daysToFirstPayment = null;

    /**
     * @var string
     */
    private $dealKey = null;

    /**
     * @var string
     */
    private $dealType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $estimatedPayment = null;

    /**
     * @var string
     */
    private $externalDealId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\BuyInfoType
     */
    private $finance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $financeCharge = null;

    /**
     * @var string[]
     */
    private $financeManagerNumbers = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\HardAddType[]
     */
    private $hardAdds = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType[]
     */
    private $incentives = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType[]
     */
    private $insuranceProducts = null;

    /**
     * @var string
     */
    private $inventoryKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\LeaseInfoType
     */
    private $lease = null;

    /**
     * @var string
     */
    private $lenderCode = null;

    /**
     * @var float
     */
    private $mileageResidualAdjustPercent = null;

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
    private $prepaidFinanceChargeAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ServiceProductType
     */
    private $productDetails = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[]
     */
    private $protectionPackages = null;

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
    private $residualAmount = null;

    /**
     * @var float
     */
    private $residualPercentage = null;

    /**
     * @var bool
     */
    private $returnDealFlag = null;

    /**
     * @var string
     */
    private $salesManagerNumber = null;

    /**
     * @var string
     */
    private $salesNumber = null;

    /**
     * @var string
     */
    private $salesNumber2 = null;

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
     * @var string
     */
    private $stockNumber = null;

    /**
     * @var int
     */
    private $storeId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $taxableSalesAmount = null;

    /**
     * @var int
     */
    private $termMonths = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType[]
     */
    private $tradeIns = null;

    /**
     * @var int
     */
    private $vehicleId = null;

    /**
     * @var bool
     */
    private $waiveFeesAndTaxes = null;

    /**
     * Gets as baseResidualAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBaseResidualAmount()
    {
        return $this->baseResidualAmount;
    }

    /**
     * Sets a new baseResidualAmount.
     *
     * @return self
     */
    public function setBaseResidualAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseResidualAmount)
    {
        $this->baseResidualAmount = $baseResidualAmount;

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
     * @return self
     */
    public function setCobuyer(\App\Soap\dealerbuilt\src\Models\Sales\CobuyerInfoType $cobuyer)
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
     * Gets as dealKey.
     *
     * @return string
     */
    public function getDealKey()
    {
        return $this->dealKey;
    }

    /**
     * Sets a new dealKey.
     *
     * @param string $dealKey
     *
     * @return self
     */
    public function setDealKey($dealKey)
    {
        $this->dealKey = $dealKey;

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
     * Gets as estimatedPayment.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getEstimatedPayment()
    {
        return $this->estimatedPayment;
    }

    /**
     * Sets a new estimatedPayment.
     *
     * @return self
     */
    public function setEstimatedPayment(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $estimatedPayment)
    {
        $this->estimatedPayment = $estimatedPayment;

        return $this;
    }

    /**
     * Gets as externalDealId.
     *
     * @return string
     */
    public function getExternalDealId()
    {
        return $this->externalDealId;
    }

    /**
     * Sets a new externalDealId.
     *
     * @param string $externalDealId
     *
     * @return self
     */
    public function setExternalDealId($externalDealId)
    {
        $this->externalDealId = $externalDealId;

        return $this;
    }

    /**
     * Gets as finance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\BuyInfoType
     */
    public function getFinance()
    {
        return $this->finance;
    }

    /**
     * Sets a new finance.
     *
     * @return self
     */
    public function setFinance(\App\Soap\dealerbuilt\src\Models\Sales\BuyInfoType $finance)
    {
        $this->finance = $finance;

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
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToFinanceManagerNumbers($string)
    {
        $this->financeManagerNumbers[] = $string;

        return $this;
    }

    /**
     * isset financeManagerNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetFinanceManagerNumbers($index)
    {
        return isset($this->financeManagerNumbers[$index]);
    }

    /**
     * unset financeManagerNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetFinanceManagerNumbers($index)
    {
        unset($this->financeManagerNumbers[$index]);
    }

    /**
     * Gets as financeManagerNumbers.
     *
     * @return string[]
     */
    public function getFinanceManagerNumbers()
    {
        return $this->financeManagerNumbers;
    }

    /**
     * Sets a new financeManagerNumbers.
     *
     * @param string[] $financeManagerNumbers
     *
     * @return self
     */
    public function setFinanceManagerNumbers(array $financeManagerNumbers)
    {
        $this->financeManagerNumbers = $financeManagerNumbers;

        return $this;
    }

    /**
     * Adds as hardAdd.
     *
     * @return self
     */
    public function addToHardAdds(\App\Soap\dealerbuilt\src\Models\Sales\HardAddType $hardAdd)
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
     * Adds as incentive.
     *
     * @return self
     */
    public function addToIncentives(\App\Soap\dealerbuilt\src\Models\Sales\IncentiveType $incentive)
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
     * Adds as insuranceProduct.
     *
     * @return self
     */
    public function addToInsuranceProducts(\App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType $insuranceProduct)
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
     * Gets as inventoryKey.
     *
     * @return string
     */
    public function getInventoryKey()
    {
        return $this->inventoryKey;
    }

    /**
     * Sets a new inventoryKey.
     *
     * @param string $inventoryKey
     *
     * @return self
     */
    public function setInventoryKey($inventoryKey)
    {
        $this->inventoryKey = $inventoryKey;

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
     * @return self
     */
    public function setLease(\App\Soap\dealerbuilt\src\Models\Sales\LeaseInfoType $lease)
    {
        $this->lease = $lease;

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
     * Gets as mileageResidualAdjustPercent.
     *
     * @return float
     */
    public function getMileageResidualAdjustPercent()
    {
        return $this->mileageResidualAdjustPercent;
    }

    /**
     * Sets a new mileageResidualAdjustPercent.
     *
     * @param float $mileageResidualAdjustPercent
     *
     * @return self
     */
    public function setMileageResidualAdjustPercent($mileageResidualAdjustPercent)
    {
        $this->mileageResidualAdjustPercent = $mileageResidualAdjustPercent;

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
     * Gets as productDetails.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\ServiceProductType
     */
    public function getProductDetails()
    {
        return $this->productDetails;
    }

    /**
     * Sets a new productDetails.
     *
     * @return self
     */
    public function setProductDetails(\App\Soap\dealerbuilt\src\Models\Sales\ServiceProductType $productDetails)
    {
        $this->productDetails = $productDetails;

        return $this;
    }

    /**
     * Adds as protectionPackage.
     *
     * @return self
     */
    public function addToProtectionPackages(\App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType $protectionPackage)
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
     */
    public function addToRebates(\App\Soap\dealerbuilt\src\Models\Sales\RebateType $rebate)
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
     * Gets as residualPercentage.
     *
     * @return float
     */
    public function getResidualPercentage()
    {
        return $this->residualPercentage;
    }

    /**
     * Sets a new residualPercentage.
     *
     * @param float $residualPercentage
     *
     * @return self
     */
    public function setResidualPercentage($residualPercentage)
    {
        $this->residualPercentage = $residualPercentage;

        return $this;
    }

    /**
     * Gets as returnDealFlag.
     *
     * @return bool
     */
    public function getReturnDealFlag()
    {
        return $this->returnDealFlag;
    }

    /**
     * Sets a new returnDealFlag.
     *
     * @param bool $returnDealFlag
     *
     * @return self
     */
    public function setReturnDealFlag($returnDealFlag)
    {
        $this->returnDealFlag = $returnDealFlag;

        return $this;
    }

    /**
     * Gets as salesManagerNumber.
     *
     * @return string
     */
    public function getSalesManagerNumber()
    {
        return $this->salesManagerNumber;
    }

    /**
     * Sets a new salesManagerNumber.
     *
     * @param string $salesManagerNumber
     *
     * @return self
     */
    public function setSalesManagerNumber($salesManagerNumber)
    {
        $this->salesManagerNumber = $salesManagerNumber;

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
     */
    public function addToServiceContracts(\App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType $serviceContract)
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
     */
    public function addToSoftAdds(\App\Soap\dealerbuilt\src\Models\Sales\SoftAddType $softAdd)
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
     * Gets as stockNumber.
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber.
     *
     * @param string $stockNumber
     *
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;

        return $this;
    }

    /**
     * Gets as storeId.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId.
     *
     * @param int $storeId
     *
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

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
     * Adds as tradeInPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType $tradeInPushRequest
     */
    public function addToTradeIns(TradeInPushRequestType $tradeInPushRequest)
    {
        $this->tradeIns[] = $tradeInPushRequest;

        return $this;
    }

    /**
     * isset tradeIns.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetTradeIns($index)
    {
        return isset($this->tradeIns[$index]);
    }

    /**
     * unset tradeIns.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetTradeIns($index)
    {
        unset($this->tradeIns[$index]);
    }

    /**
     * Gets as tradeIns.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType[]
     */
    public function getTradeIns()
    {
        return $this->tradeIns;
    }

    /**
     * Sets a new tradeIns.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType[] $tradeIns
     *
     * @return self
     */
    public function setTradeIns(array $tradeIns)
    {
        $this->tradeIns = $tradeIns;

        return $this;
    }

    /**
     * Gets as vehicleId.
     *
     * @return int
     */
    public function getVehicleId()
    {
        return $this->vehicleId;
    }

    /**
     * Sets a new vehicleId.
     *
     * @param int $vehicleId
     *
     * @return self
     */
    public function setVehicleId($vehicleId)
    {
        $this->vehicleId = $vehicleId;

        return $this;
    }

    /**
     * Gets as waiveFeesAndTaxes.
     *
     * @return bool
     */
    public function getWaiveFeesAndTaxes()
    {
        return $this->waiveFeesAndTaxes;
    }

    /**
     * Sets a new waiveFeesAndTaxes.
     *
     * @param bool $waiveFeesAndTaxes
     *
     * @return self
     */
    public function setWaiveFeesAndTaxes($waiveFeesAndTaxes)
    {
        $this->waiveFeesAndTaxes = $waiveFeesAndTaxes;

        return $this;
    }
}
