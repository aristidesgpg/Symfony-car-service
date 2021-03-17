<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing ClosedRepairOrderLookupResult
 */
class ClosedRepairOrderLookupResult
{

    /**
     * @var \App\Soap\dealertrack\src\Result[] $result
     */
    private $result = [
        
    ];

    /**
     * Adds as result
     *
     * @return self
     * @param \App\Soap\dealertrack\src\Result $result
     */
    public function addToResult(\App\Soap\dealertrack\src\Result $result)
    {
        $this->result[] = $result;
        return $this;
    }

    /**
     * isset result
     *
     * @param int|string $index
     * @return bool
     */
    public function issetResult($index)
    {
        return isset($this->result[$index]);
    }

    /**
     * unset result
     *
     * @param int|string $index
     * @return void
     */
    public function unsetResult($index)
    {
        unset($this->result[$index]);
    }

    /**
     * Gets as result
     *
     * @return \App\Soap\dealertrack\src\Result[]
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Sets a new result
     *
     * @param \App\Soap\dealertrack\src\Result[] $result
     * @return self
     */
    public function setResult(array $result)
    {
        $this->result = $result;
        return $this;
    }


}

