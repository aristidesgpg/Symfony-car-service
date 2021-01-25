<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing SalesPriceAttributesType.
 *
 * XSD Type: SalesPriceAttributes
 */
class SalesPriceAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $advertisedSalePrice = null;

    /**
     * @var string
     */
    private $dealerDefinedStatus = null;

    /**
     * @var bool
     */
    private $explodeVin = null;

    /**
     * @var string
     */
    private $invoiceNumberString = null;

    /**
     * @var string
     */
    private $modifiedBy = null;

    /**
     * @var \DateTime
     */
    private $modifiedStamp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType
     */
    private $stockDataAttributes = null;

    /**
     * @var string
     */
    private $stockNumber = null;

    /**
     * Gets as advertisedSalePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAdvertisedSalePrice()
    {
        return $this->advertisedSalePrice;
    }

    /**
     * Sets a new advertisedSalePrice.
     *
     * @return self
     */
    public function setAdvertisedSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisedSalePrice)
    {
        $this->advertisedSalePrice = $advertisedSalePrice;

        return $this;
    }

    /**
     * Gets as dealerDefinedStatus.
     *
     * @return string
     */
    public function getDealerDefinedStatus()
    {
        return $this->dealerDefinedStatus;
    }

    /**
     * Sets a new dealerDefinedStatus.
     *
     * @param string $dealerDefinedStatus
     *
     * @return self
     */
    public function setDealerDefinedStatus($dealerDefinedStatus)
    {
        $this->dealerDefinedStatus = $dealerDefinedStatus;

        return $this;
    }

    /**
     * Gets as explodeVin.
     *
     * @return bool
     */
    public function getExplodeVin()
    {
        return $this->explodeVin;
    }

    /**
     * Sets a new explodeVin.
     *
     * @param bool $explodeVin
     *
     * @return self
     */
    public function setExplodeVin($explodeVin)
    {
        $this->explodeVin = $explodeVin;

        return $this;
    }

    /**
     * Gets as invoiceNumberString.
     *
     * @return string
     */
    public function getInvoiceNumberString()
    {
        return $this->invoiceNumberString;
    }

    /**
     * Sets a new invoiceNumberString.
     *
     * @param string $invoiceNumberString
     *
     * @return self
     */
    public function setInvoiceNumberString($invoiceNumberString)
    {
        $this->invoiceNumberString = $invoiceNumberString;

        return $this;
    }

    /**
     * Gets as modifiedBy.
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy.
     *
     * @param string $modifiedBy
     *
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Gets as modifiedStamp.
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp.
     *
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;

        return $this;
    }

    /**
     * Gets as stockDataAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType
     */
    public function getStockDataAttributes()
    {
        return $this->stockDataAttributes;
    }

    /**
     * Sets a new stockDataAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType $stockDataAttributes
     *
     * @return self
     */
    public function setStockDataAttributes(StockItemDataAttributesType $stockDataAttributes)
    {
        $this->stockDataAttributes = $stockDataAttributes;

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
}
