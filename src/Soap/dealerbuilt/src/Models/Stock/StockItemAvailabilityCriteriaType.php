<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing StockItemAvailabilityCriteriaType
 *
 * 
 * XSD Type: StockItemAvailabilityCriteria
 */
class StockItemAvailabilityCriteriaType
{

    /**
     * @var bool $includeAvailable
     */
    private $includeAvailable = null;

    /**
     * @var bool $includeOther
     */
    private $includeOther = null;

    /**
     * @var bool $includePending
     */
    private $includePending = null;

    /**
     * @var bool $includeSold
     */
    private $includeSold = null;

    /**
     * Gets as includeAvailable
     *
     * @return bool
     */
    public function getIncludeAvailable()
    {
        return $this->includeAvailable;
    }

    /**
     * Sets a new includeAvailable
     *
     * @param bool $includeAvailable
     * @return self
     */
    public function setIncludeAvailable($includeAvailable)
    {
        $this->includeAvailable = $includeAvailable;
        return $this;
    }

    /**
     * Gets as includeOther
     *
     * @return bool
     */
    public function getIncludeOther()
    {
        return $this->includeOther;
    }

    /**
     * Sets a new includeOther
     *
     * @param bool $includeOther
     * @return self
     */
    public function setIncludeOther($includeOther)
    {
        $this->includeOther = $includeOther;
        return $this;
    }

    /**
     * Gets as includePending
     *
     * @return bool
     */
    public function getIncludePending()
    {
        return $this->includePending;
    }

    /**
     * Sets a new includePending
     *
     * @param bool $includePending
     * @return self
     */
    public function setIncludePending($includePending)
    {
        $this->includePending = $includePending;
        return $this;
    }

    /**
     * Gets as includeSold
     *
     * @return bool
     */
    public function getIncludeSold()
    {
        return $this->includeSold;
    }

    /**
     * Sets a new includeSold
     *
     * @param bool $includeSold
     * @return self
     */
    public function setIncludeSold($includeSold)
    {
        $this->includeSold = $includeSold;
        return $this;
    }


}

