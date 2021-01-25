<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing LaborOperationSubletType
 *
 * 
 * XSD Type: LaborOperationSublet
 */
class LaborOperationSubletType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $invoiceNumber
     */
    private $invoiceNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $salePrice
     */
    private $salePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $tax
     */
    private $tax = null;

    /**
     * Gets as cost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as invoiceNumber
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Sets a new invoiceNumber
     *
     * @param string $invoiceNumber
     * @return self
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * Gets as salePrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Sets a new salePrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $salePrice
     * @return self
     */
    public function setSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $salePrice)
    {
        $this->salePrice = $salePrice;
        return $this;
    }

    /**
     * Gets as tax
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $tax
     * @return self
     */
    public function setTax(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tax)
    {
        $this->tax = $tax;
        return $this;
    }


}

