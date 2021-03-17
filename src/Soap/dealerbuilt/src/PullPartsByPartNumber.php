<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsByPartNumber
 */
class PullPartsByPartNumber
{

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string[] $partNumbers
     */
    private $partNumbers = null;

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToPartNumbers($string)
    {
        $this->partNumbers[] = $string;
        return $this;
    }

    /**
     * isset partNumbers
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartNumbers($index)
    {
        return isset($this->partNumbers[$index]);
    }

    /**
     * unset partNumbers
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartNumbers($index)
    {
        unset($this->partNumbers[$index]);
    }

    /**
     * Gets as partNumbers
     *
     * @return string[]
     */
    public function getPartNumbers()
    {
        return $this->partNumbers;
    }

    /**
     * Sets a new partNumbers
     *
     * @param string[] $partNumbers
     * @return self
     */
    public function setPartNumbers(array $partNumbers)
    {
        $this->partNumbers = $partNumbers;
        return $this;
    }


}

