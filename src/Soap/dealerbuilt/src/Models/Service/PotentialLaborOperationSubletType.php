<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PotentialLaborOperationSubletType.
 *
 * XSD Type: PotentialLaborOperationSublet
 */
class PotentialLaborOperationSubletType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $invoiceNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $salePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $tax = null;

    /**
     * Gets as cost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost.
     *
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Gets as description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets as invoiceNumber.
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Sets a new invoiceNumber.
     *
     * @param string $invoiceNumber
     *
     * @return self
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * Gets as salePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Sets a new salePrice.
     *
     * @return self
     */
    public function setSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $salePrice)
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    /**
     * Gets as tax.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax.
     *
     * @return self
     */
    public function setTax(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tax)
    {
        $this->tax = $tax;

        return $this;
    }
}
