<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing InventorySearchCriteriaType
 *
 * 
 * XSD Type: InventorySearchCriteria
 */
class InventorySearchCriteriaType extends StoresSearchCriteriaType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemAvailabilityCriteriaType $availability
     */
    private $availability = null;

    /**
     * @var \DateTime $maxDateReceived
     */
    private $maxDateReceived = null;

    /**
     * @var \DateTime $maxDateSold
     */
    private $maxDateSold = null;

    /**
     * @var \DateTime $minDateReceived
     */
    private $minDateReceived = null;

    /**
     * @var \DateTime $minDateSold
     */
    private $minDateSold = null;

    /**
     * @var string $partialMake
     */
    private $partialMake = null;

    /**
     * @var string $partialModel
     */
    private $partialModel = null;

    /**
     * @var int $year
     */
    private $year = null;

    /**
     * Gets as availability
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\StockItemAvailabilityCriteriaType
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Sets a new availability
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\StockItemAvailabilityCriteriaType $availability
     * @return self
     */
    public function setAvailability(\App\Soap\dealerbuilt\src\Models\Stock\StockItemAvailabilityCriteriaType $availability)
    {
        $this->availability = $availability;
        return $this;
    }

    /**
     * Gets as maxDateReceived
     *
     * @return \DateTime
     */
    public function getMaxDateReceived()
    {
        return $this->maxDateReceived;
    }

    /**
     * Sets a new maxDateReceived
     *
     * @param \DateTime $maxDateReceived
     * @return self
     */
    public function setMaxDateReceived(\DateTime $maxDateReceived)
    {
        $this->maxDateReceived = $maxDateReceived;
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
     * Gets as minDateReceived
     *
     * @return \DateTime
     */
    public function getMinDateReceived()
    {
        return $this->minDateReceived;
    }

    /**
     * Sets a new minDateReceived
     *
     * @param \DateTime $minDateReceived
     * @return self
     */
    public function setMinDateReceived(\DateTime $minDateReceived)
    {
        $this->minDateReceived = $minDateReceived;
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
     * Gets as partialMake
     *
     * @return string
     */
    public function getPartialMake()
    {
        return $this->partialMake;
    }

    /**
     * Sets a new partialMake
     *
     * @param string $partialMake
     * @return self
     */
    public function setPartialMake($partialMake)
    {
        $this->partialMake = $partialMake;
        return $this;
    }

    /**
     * Gets as partialModel
     *
     * @return string
     */
    public function getPartialModel()
    {
        return $this->partialModel;
    }

    /**
     * Sets a new partialModel
     *
     * @param string $partialModel
     * @return self
     */
    public function setPartialModel($partialModel)
    {
        $this->partialModel = $partialModel;
        return $this;
    }

    /**
     * Gets as year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets a new year
     *
     * @param int $year
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }


}

