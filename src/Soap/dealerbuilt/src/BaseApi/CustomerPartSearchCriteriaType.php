<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerPartSearchCriteriaType.
 *
 * XSD Type: CustomerPartSearchCriteria
 */
class CustomerPartSearchCriteriaType extends SearchCriteriaType
{
    /**
     * @var int
     */
    private $customerId = null;

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
     * @var string[]
     */
    private $partialPartNumbers = null;

    /**
     * @var int[]
     */
    private $serviceLocationIds = null;

    /**
     * @var int[]
     */
    private $sourceIds = null;

    /**
     * @var string
     */
    private $vendor = null;

    /**
     * Gets as customerId.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets a new customerId.
     *
     * @param int $customerId
     *
     * @return self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

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
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToPartialPartNumbers($string)
    {
        $this->partialPartNumbers[] = $string;

        return $this;
    }

    /**
     * isset partialPartNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartialPartNumbers($index)
    {
        return isset($this->partialPartNumbers[$index]);
    }

    /**
     * unset partialPartNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartialPartNumbers($index)
    {
        unset($this->partialPartNumbers[$index]);
    }

    /**
     * Gets as partialPartNumbers.
     *
     * @return string[]
     */
    public function getPartialPartNumbers()
    {
        return $this->partialPartNumbers;
    }

    /**
     * Sets a new partialPartNumbers.
     *
     * @param string[] $partialPartNumbers
     *
     * @return self
     */
    public function setPartialPartNumbers(array $partialPartNumbers)
    {
        $this->partialPartNumbers = $partialPartNumbers;

        return $this;
    }

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToServiceLocationIds($long)
    {
        $this->serviceLocationIds[] = $long;

        return $this;
    }

    /**
     * isset serviceLocationIds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceLocationIds($index)
    {
        return isset($this->serviceLocationIds[$index]);
    }

    /**
     * unset serviceLocationIds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceLocationIds($index)
    {
        unset($this->serviceLocationIds[$index]);
    }

    /**
     * Gets as serviceLocationIds.
     *
     * @return int[]
     */
    public function getServiceLocationIds()
    {
        return $this->serviceLocationIds;
    }

    /**
     * Sets a new serviceLocationIds.
     *
     * @param int[] $serviceLocationIds
     *
     * @return self
     */
    public function setServiceLocationIds(array $serviceLocationIds)
    {
        $this->serviceLocationIds = $serviceLocationIds;

        return $this;
    }

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToSourceIds($long)
    {
        $this->sourceIds[] = $long;

        return $this;
    }

    /**
     * isset sourceIds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSourceIds($index)
    {
        return isset($this->sourceIds[$index]);
    }

    /**
     * unset sourceIds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSourceIds($index)
    {
        unset($this->sourceIds[$index]);
    }

    /**
     * Gets as sourceIds.
     *
     * @return int[]
     */
    public function getSourceIds()
    {
        return $this->sourceIds;
    }

    /**
     * Sets a new sourceIds.
     *
     * @param int[] $sourceIds
     *
     * @return self
     */
    public function setSourceIds(array $sourceIds)
    {
        $this->sourceIds = $sourceIds;

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
