<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfInsuranceProductType
 *
 * 
 * XSD Type: ArrayOfInsuranceProduct
 */
class ArrayOfInsuranceProductType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType[] $insuranceProduct
     */
    private $insuranceProduct = [
        
    ];

    /**
     * Adds as insuranceProduct
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType $insuranceProduct
     */
    public function addToInsuranceProduct(\App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType $insuranceProduct)
    {
        $this->insuranceProduct[] = $insuranceProduct;
        return $this;
    }

    /**
     * isset insuranceProduct
     *
     * @param int|string $index
     * @return bool
     */
    public function issetInsuranceProduct($index)
    {
        return isset($this->insuranceProduct[$index]);
    }

    /**
     * unset insuranceProduct
     *
     * @param int|string $index
     * @return void
     */
    public function unsetInsuranceProduct($index)
    {
        unset($this->insuranceProduct[$index]);
    }

    /**
     * Gets as insuranceProduct
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType[]
     */
    public function getInsuranceProduct()
    {
        return $this->insuranceProduct;
    }

    /**
     * Sets a new insuranceProduct
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\InsuranceProductType[] $insuranceProduct
     * @return self
     */
    public function setInsuranceProduct(array $insuranceProduct)
    {
        $this->insuranceProduct = $insuranceProduct;
        return $this;
    }


}

