<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PurchaseOrderType.
 *
 * XSD Type: PurchaseOrder
 */
class PurchaseOrderType extends ApiCompanyItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $amount = null;

    /**
     * @var string[]
     */
    private $invoiceNumbers = null;

    /**
     * @var \DateTime
     */
    private $purchaseOrderDate = null;

    /**
     * @var string
     */
    private $purchaseOrderNumber = null;

    /**
     * @var string
     */
    private $vendorId = null;

    /**
     * @var string
     */
    private $vendorName = null;

    /**
     * Gets as amount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount.
     *
     * @return self
     */
    public function setAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToInvoiceNumbers($string)
    {
        $this->invoiceNumbers[] = $string;

        return $this;
    }

    /**
     * isset invoiceNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetInvoiceNumbers($index)
    {
        return isset($this->invoiceNumbers[$index]);
    }

    /**
     * unset invoiceNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetInvoiceNumbers($index)
    {
        unset($this->invoiceNumbers[$index]);
    }

    /**
     * Gets as invoiceNumbers.
     *
     * @return string[]
     */
    public function getInvoiceNumbers()
    {
        return $this->invoiceNumbers;
    }

    /**
     * Sets a new invoiceNumbers.
     *
     * @param string[] $invoiceNumbers
     *
     * @return self
     */
    public function setInvoiceNumbers(array $invoiceNumbers)
    {
        $this->invoiceNumbers = $invoiceNumbers;

        return $this;
    }

    /**
     * Gets as purchaseOrderDate.
     *
     * @return \DateTime
     */
    public function getPurchaseOrderDate()
    {
        return $this->purchaseOrderDate;
    }

    /**
     * Sets a new purchaseOrderDate.
     *
     * @return self
     */
    public function setPurchaseOrderDate(\DateTime $purchaseOrderDate)
    {
        $this->purchaseOrderDate = $purchaseOrderDate;

        return $this;
    }

    /**
     * Gets as purchaseOrderNumber.
     *
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return $this->purchaseOrderNumber;
    }

    /**
     * Sets a new purchaseOrderNumber.
     *
     * @param string $purchaseOrderNumber
     *
     * @return self
     */
    public function setPurchaseOrderNumber($purchaseOrderNumber)
    {
        $this->purchaseOrderNumber = $purchaseOrderNumber;

        return $this;
    }

    /**
     * Gets as vendorId.
     *
     * @return string
     */
    public function getVendorId()
    {
        return $this->vendorId;
    }

    /**
     * Sets a new vendorId.
     *
     * @param string $vendorId
     *
     * @return self
     */
    public function setVendorId($vendorId)
    {
        $this->vendorId = $vendorId;

        return $this;
    }

    /**
     * Gets as vendorName.
     *
     * @return string
     */
    public function getVendorName()
    {
        return $this->vendorName;
    }

    /**
     * Sets a new vendorName.
     *
     * @param string $vendorName
     *
     * @return self
     */
    public function setVendorName($vendorName)
    {
        $this->vendorName = $vendorName;

        return $this;
    }
}
