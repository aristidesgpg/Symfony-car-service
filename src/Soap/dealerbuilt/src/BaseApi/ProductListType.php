<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ProductListType.
 *
 * XSD Type: ProductList
 */
class ProductListType extends ApiStoreItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\CostAddType[]
     */
    private $costAdds = null;

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
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[]
     */
    private $protectionPackages = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\RebateType[]
     */
    private $rebates = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType[]
     */
    private $serviceContracts = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType[]
     */
    private $softAdds = null;

    /**
     * Adds as costAdd.
     *
     * @return self
     */
    public function addToCostAdds(\App\Soap\dealerbuilt\src\Models\Sales\CostAddType $costAdd)
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
}
