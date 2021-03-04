<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DealSearchCriteriaType
 *
 * 
 * XSD Type: DealSearchCriteria
 */
class DealSearchCriteriaType extends StoresSearchCriteriaType
{

    /**
     * @var string $exactVin
     */
    private $exactVin = null;

    /**
     * @var bool $includeUnstockedTrades
     */
    private $includeUnstockedTrades = null;

    /**
     * @var \DateTime $maxDateSold
     */
    private $maxDateSold = null;

    /**
     * @var \DateTime $maximumUpdateStamp
     */
    private $maximumUpdateStamp = null;

    /**
     * @var \DateTime $minDateSold
     */
    private $minDateSold = null;

    /**
     * @var \DateTime $minimumUpdateStamp
     */
    private $minimumUpdateStamp = null;

    /**
     * @var string $partialVin
     */
    private $partialVin = null;

    /**
     * @var string $stockNumber
     */
    private $stockNumber = null;

    /**
     * Gets as exactVin
     *
     * @return string
     */
    public function getExactVin()
    {
        return $this->exactVin;
    }

    /**
     * Sets a new exactVin
     *
     * @param string $exactVin
     * @return self
     */
    public function setExactVin($exactVin)
    {
        $this->exactVin = $exactVin;
        return $this;
    }

    /**
     * Gets as includeUnstockedTrades
     *
     * @return bool
     */
    public function getIncludeUnstockedTrades()
    {
        return $this->includeUnstockedTrades;
    }

    /**
     * Sets a new includeUnstockedTrades
     *
     * @param bool $includeUnstockedTrades
     * @return self
     */
    public function setIncludeUnstockedTrades($includeUnstockedTrades)
    {
        $this->includeUnstockedTrades = $includeUnstockedTrades;
        return $this;
    }

    /**
     * Gets as maxDateSold
     *
     * @return \DateTime
     */
    public function getMaxDateSold()
    {
        return $this->maxDateSold;
    }

    /**
     * Sets a new maxDateSold
     *
     * @param \DateTime $maxDateSold
     * @return self
     */
    public function setMaxDateSold(\DateTime $maxDateSold)
    {
        $this->maxDateSold = $maxDateSold;
        return $this;
    }

    /**
     * Gets as maximumUpdateStamp
     *
     * @return \DateTime
     */
    public function getMaximumUpdateStamp()
    {
        return $this->maximumUpdateStamp;
    }

    /**
     * Sets a new maximumUpdateStamp
     *
     * @param \DateTime $maximumUpdateStamp
     * @return self
     */
    public function setMaximumUpdateStamp(\DateTime $maximumUpdateStamp)
    {
        $this->maximumUpdateStamp = $maximumUpdateStamp;
        return $this;
    }

    /**
     * Gets as minDateSold
     *
     * @return \DateTime
     */
    public function getMinDateSold()
    {
        return $this->minDateSold;
    }

    /**
     * Sets a new minDateSold
     *
     * @param \DateTime $minDateSold
     * @return self
     */
    public function setMinDateSold(\DateTime $minDateSold)
    {
        $this->minDateSold = $minDateSold;
        return $this;
    }

    /**
     * Gets as minimumUpdateStamp
     *
     * @return \DateTime
     */
    public function getMinimumUpdateStamp()
    {
        return $this->minimumUpdateStamp;
    }

    /**
     * Sets a new minimumUpdateStamp
     *
     * @param \DateTime $minimumUpdateStamp
     * @return self
     */
    public function setMinimumUpdateStamp(\DateTime $minimumUpdateStamp)
    {
        $this->minimumUpdateStamp = $minimumUpdateStamp;
        return $this;
    }

    /**
     * Gets as partialVin
     *
     * @return string
     */
    public function getPartialVin()
    {
        return $this->partialVin;
    }

    /**
     * Sets a new partialVin
     *
     * @param string $partialVin
     * @return self
     */
    public function setPartialVin($partialVin)
    {
        $this->partialVin = $partialVin;
        return $this;
    }

    /**
     * Gets as stockNumber
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber
     *
     * @param string $stockNumber
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;
        return $this;
    }


}

