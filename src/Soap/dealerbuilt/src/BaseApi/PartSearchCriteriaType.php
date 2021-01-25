<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartSearchCriteriaType.
 *
 * XSD Type: PartSearchCriteria
 */
class PartSearchCriteriaType extends ServiceLocationsSearchCriteriaType
{
    /**
     * @var \DateTime
     */
    private $maximumAddedDate = null;

    /**
     * @var \DateTime
     */
    private $maximumFirstSoldDate = null;

    /**
     * @var \DateTime
     */
    private $maximumLastReceiptDate = null;

    /**
     * @var \DateTime
     */
    private $minimumAddedDate = null;

    /**
     * @var \DateTime
     */
    private $minimumFirstSoldDate = null;

    /**
     * @var \DateTime
     */
    private $minimumLastReceiptDate = null;

    /**
     * @var string
     */
    private $onHandScope = null;

    /**
     * @var string
     */
    private $partialPartNumber = null;

    /**
     * @var string
     */
    private $vendor = null;

    /**
     * Gets as maximumAddedDate.
     *
     * @return \DateTime
     */
    public function getMaximumAddedDate()
    {
        return $this->maximumAddedDate;
    }

    /**
     * Sets a new maximumAddedDate.
     *
     * @return self
     */
    public function setMaximumAddedDate(\DateTime $maximumAddedDate)
    {
        $this->maximumAddedDate = $maximumAddedDate;

        return $this;
    }

    /**
     * Gets as maximumFirstSoldDate.
     *
     * @return \DateTime
     */
    public function getMaximumFirstSoldDate()
    {
        return $this->maximumFirstSoldDate;
    }

    /**
     * Sets a new maximumFirstSoldDate.
     *
     * @return self
     */
    public function setMaximumFirstSoldDate(\DateTime $maximumFirstSoldDate)
    {
        $this->maximumFirstSoldDate = $maximumFirstSoldDate;

        return $this;
    }

    /**
     * Gets as maximumLastReceiptDate.
     *
     * @return \DateTime
     */
    public function getMaximumLastReceiptDate()
    {
        return $this->maximumLastReceiptDate;
    }

    /**
     * Sets a new maximumLastReceiptDate.
     *
     * @return self
     */
    public function setMaximumLastReceiptDate(\DateTime $maximumLastReceiptDate)
    {
        $this->maximumLastReceiptDate = $maximumLastReceiptDate;

        return $this;
    }

    /**
     * Gets as minimumAddedDate.
     *
     * @return \DateTime
     */
    public function getMinimumAddedDate()
    {
        return $this->minimumAddedDate;
    }

    /**
     * Sets a new minimumAddedDate.
     *
     * @return self
     */
    public function setMinimumAddedDate(\DateTime $minimumAddedDate)
    {
        $this->minimumAddedDate = $minimumAddedDate;

        return $this;
    }

    /**
     * Gets as minimumFirstSoldDate.
     *
     * @return \DateTime
     */
    public function getMinimumFirstSoldDate()
    {
        return $this->minimumFirstSoldDate;
    }

    /**
     * Sets a new minimumFirstSoldDate.
     *
     * @return self
     */
    public function setMinimumFirstSoldDate(\DateTime $minimumFirstSoldDate)
    {
        $this->minimumFirstSoldDate = $minimumFirstSoldDate;

        return $this;
    }

    /**
     * Gets as minimumLastReceiptDate.
     *
     * @return \DateTime
     */
    public function getMinimumLastReceiptDate()
    {
        return $this->minimumLastReceiptDate;
    }

    /**
     * Sets a new minimumLastReceiptDate.
     *
     * @return self
     */
    public function setMinimumLastReceiptDate(\DateTime $minimumLastReceiptDate)
    {
        $this->minimumLastReceiptDate = $minimumLastReceiptDate;

        return $this;
    }

    /**
     * Gets as onHandScope.
     *
     * @return string
     */
    public function getOnHandScope()
    {
        return $this->onHandScope;
    }

    /**
     * Sets a new onHandScope.
     *
     * @param string $onHandScope
     *
     * @return self
     */
    public function setOnHandScope($onHandScope)
    {
        $this->onHandScope = $onHandScope;

        return $this;
    }

    /**
     * Gets as partialPartNumber.
     *
     * @return string
     */
    public function getPartialPartNumber()
    {
        return $this->partialPartNumber;
    }

    /**
     * Sets a new partialPartNumber.
     *
     * @param string $partialPartNumber
     *
     * @return self
     */
    public function setPartialPartNumber($partialPartNumber)
    {
        $this->partialPartNumber = $partialPartNumber;

        return $this;
    }

    /**
     * Gets as vendor.
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets a new vendor.
     *
     * @param string $vendor
     *
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }
}
