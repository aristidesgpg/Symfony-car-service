<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsInventoryPricingResultContainerType
 *
 * 
 * XSD Type: partsInventoryPricingResultContainer
 */
class PartsInventoryPricingResultContainerType
{

    /**
     * @var string $code
     */
    private $code = null;

    /**
     * @var string $message
     */
    private $message = null;

    /**
     * @var \App\Soap\cdk\src\PartsInventoryPricingResultType[] $results
     */
    private $results = [
        
    ];

    /**
     * Gets as code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets a new message
     *
     * @param string $message
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Adds as results
     *
     * @return self
     * @param \App\Soap\cdk\src\PartsInventoryPricingResultType $results
     */
    public function addToResults(\App\Soap\cdk\src\PartsInventoryPricingResultType $results)
    {
        $this->results[] = $results;
        return $this;
    }

    /**
     * isset results
     *
     * @param int|string $index
     * @return bool
     */
    public function issetResults($index)
    {
        return isset($this->results[$index]);
    }

    /**
     * unset results
     *
     * @param int|string $index
     * @return void
     */
    public function unsetResults($index)
    {
        unset($this->results[$index]);
    }

    /**
     * Gets as results
     *
     * @return \App\Soap\cdk\src\PartsInventoryPricingResultType[]
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Sets a new results
     *
     * @param \App\Soap\cdk\src\PartsInventoryPricingResultType[] $results
     * @return self
     */
    public function setResults(array $results)
    {
        $this->results = $results;
        return $this;
    }


}

