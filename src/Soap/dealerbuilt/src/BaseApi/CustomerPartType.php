<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerPartType.
 *
 * XSD Type: CustomerPart
 */
class CustomerPartType extends InventoryPartType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $customerCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $customerListPrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $customerNetPrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $customerSalePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $customerSell = null;

    /**
     * @var int
     */
    private $discountLocationId = null;

    /**
     * @var string
     */
    private $errorMessage = null;

    /**
     * Gets as customerCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerCost()
    {
        return $this->customerCost;
    }

    /**
     * Sets a new customerCost.
     *
     * @return self
     */
    public function setCustomerCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerCost)
    {
        $this->customerCost = $customerCost;

        return $this;
    }

    /**
     * Gets as customerListPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerListPrice()
    {
        return $this->customerListPrice;
    }

    /**
     * Sets a new customerListPrice.
     *
     * @return self
     */
    public function setCustomerListPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerListPrice)
    {
        $this->customerListPrice = $customerListPrice;

        return $this;
    }

    /**
     * Gets as customerNetPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerNetPrice()
    {
        return $this->customerNetPrice;
    }

    /**
     * Sets a new customerNetPrice.
     *
     * @return self
     */
    public function setCustomerNetPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerNetPrice)
    {
        $this->customerNetPrice = $customerNetPrice;

        return $this;
    }

    /**
     * Gets as customerSalePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerSalePrice()
    {
        return $this->customerSalePrice;
    }

    /**
     * Sets a new customerSalePrice.
     *
     * @return self
     */
    public function setCustomerSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSalePrice)
    {
        $this->customerSalePrice = $customerSalePrice;

        return $this;
    }

    /**
     * Gets as customerSell.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerSell()
    {
        return $this->customerSell;
    }

    /**
     * Sets a new customerSell.
     *
     * @return self
     */
    public function setCustomerSell(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSell)
    {
        $this->customerSell = $customerSell;

        return $this;
    }

    /**
     * Gets as discountLocationId.
     *
     * @return int
     */
    public function getDiscountLocationId()
    {
        return $this->discountLocationId;
    }

    /**
     * Sets a new discountLocationId.
     *
     * @param int $discountLocationId
     *
     * @return self
     */
    public function setDiscountLocationId($discountLocationId)
    {
        $this->discountLocationId = $discountLocationId;

        return $this;
    }

    /**
     * Gets as errorMessage.
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage.
     *
     * @param string $errorMessage
     *
     * @return self
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }
}
