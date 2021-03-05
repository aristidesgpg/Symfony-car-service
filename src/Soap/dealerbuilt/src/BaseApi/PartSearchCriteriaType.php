<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartSearchCriteriaType
 *
 * 
 * XSD Type: PartSearchCriteria
 */
class PartSearchCriteriaType extends ServiceLocationsSearchCriteriaType
{

    /**
     * @var \DateTime $maximumAddedDate
     */
    private $maximumAddedDate = null;

    /**
     * @var \DateTime $maximumFirstSoldDate
     */
    private $maximumFirstSoldDate = null;

    /**
     * @var \DateTime $maximumLastReceiptDate
     */
    private $maximumLastReceiptDate = null;

    /**
     * @var \DateTime $minimumAddedDate
     */
    private $minimumAddedDate = null;

    /**
     * @var \DateTime $minimumFirstSoldDate
     */
    private $minimumFirstSoldDate = null;

    /**
     * @var \DateTime $minimumLastReceiptDate
     */
    private $minimumLastReceiptDate = null;

    /**
     * @var string $onHandScope
     */
    private $onHandScope = null;

    /**
     * @var string $partialPartNumber
     */
    private $partialPartNumber = null;

    /**
     * @var string $vendor
     */
    private $vendor = null;

    /**
     * Gets as maximumAddedDate
     *
     * @return \DateTime
     */
    public function getMaximumAddedDate()
    {
        return $this->maximumAddedDate;
    }

    /**
     * Sets a new maximumAddedDate
     *
     * @param \DateTime $maximumAddedDate
     * @return self
     */
    public function setMaximumAddedDate(\DateTime $maximumAddedDate)
    {
        $this->maximumAddedDate = $maximumAddedDate;
        return $this;
    }

    /**
     * Gets as maximumFirstSoldDate
     *
     * @return \DateTime
     */
    public function getMaximumFirstSoldDate()
    {
        return $this->maximumFirstSoldDate;
    }

    /**
     * Sets a new maximumFirstSoldDate
     *
     * @param \DateTime $maximumFirstSoldDate
     * @return self
     */
    public function setMaximumFirstSoldDate(\DateTime $maximumFirstSoldDate)
    {
        $this->maximumFirstSoldDate = $maximumFirstSoldDate;
        return $this;
    }

    /**
     * Gets as maximumLastReceiptDate
     *
     * @return \DateTime
     */
    public function getMaximumLastReceiptDate()
    {
        return $this->maximumLastReceiptDate;
    }

    /**
     * Sets a new maximumLastReceiptDate
     *
     * @param \DateTime $maximumLastReceiptDate
     * @return self
     */
    public function setMaximumLastReceiptDate(\DateTime $maximumLastReceiptDate)
    {
        $this->maximumLastReceiptDate = $maximumLastReceiptDate;
        return $this;
    }

    /**
     * Gets as minimumAddedDate
     *
     * @return \DateTime
     */
    public function getMinimumAddedDate()
    {
        return $this->minimumAddedDate;
    }

    /**
     * Sets a new minimumAddedDate
     *
     * @param \DateTime $minimumAddedDate
     * @return self
     */
    public function setMinimumAddedDate(\DateTime $minimumAddedDate)
    {
        $this->minimumAddedDate = $minimumAddedDate;
        return $this;
    }

    /**
     * Gets as minimumFirstSoldDate
     *
     * @return \DateTime
     */
    public function getMinimumFirstSoldDate()
    {
        return $this->minimumFirstSoldDate;
    }

    /**
     * Sets a new minimumFirstSoldDate
     *
     * @param \DateTime $minimumFirstSoldDate
     * @return self
     */
    public function setMinimumFirstSoldDate(\DateTime $minimumFirstSoldDate)
    {
        $this->minimumFirstSoldDate = $minimumFirstSoldDate;
        return $this;
    }

    /**
     * Gets as minimumLastReceiptDate
     *
     * @return \DateTime
     */
    public function getMinimumLastReceiptDate()
    {
        return $this->minimumLastReceiptDate;
    }

    /**
     * Sets a new minimumLastReceiptDate
     *
     * @param \DateTime $minimumLastReceiptDate
     * @return self
     */
    public function setMinimumLastReceiptDate(\DateTime $minimumLastReceiptDate)
    {
        $this->minimumLastReceiptDate = $minimumLastReceiptDate;
        return $this;
    }

    /**
     * Gets as onHandScope
     *
     * @return string
     */
    public function getOnHandScope()
    {
        return $this->onHandScope;
    }

    /**
     * Sets a new onHandScope
     *
     * @param string $onHandScope
     * @return self
     */
    public function setOnHandScope($onHandScope)
    {
        $this->onHandScope = $onHandScope;
        return $this;
    }

    /**
     * Gets as partialPartNumber
     *
     * @return string
     */
    public function getPartialPartNumber()
    {
        return $this->partialPartNumber;
    }

    /**
     * Sets a new partialPartNumber
     *
     * @param string $partialPartNumber
     * @return self
     */
    public function setPartialPartNumber($partialPartNumber)
    {
        $this->partialPartNumber = $partialPartNumber;
        return $this;
    }

    /**
     * Gets as vendor
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets a new vendor
     *
     * @param string $vendor
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }


}

