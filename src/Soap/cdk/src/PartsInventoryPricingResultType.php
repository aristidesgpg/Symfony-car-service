<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsInventoryPricingResultType
 *
 * 
 * XSD Type: partsInventoryPricingResult
 */
class PartsInventoryPricingResultType
{

    /**
     * @var string $errorCode
     */
    private $errorCode = null;

    /**
     * @var string $errorMessage
     */
    private $errorMessage = null;

    /**
     * @var string $partNumberInput
     */
    private $partNumberInput = null;

    /**
     * @var \App\Soap\cdk\src\PartsInventoryPricingResultRecordType $requestedPart
     */
    private $requestedPart = null;

    /**
     * @var \App\Soap\cdk\src\PartsInventoryPricingResultRecordType[] $supersedePartChain
     */
    private $supersedePartChain = [
        
    ];

    /**
     * Gets as errorCode
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Sets a new errorCode
     *
     * @param string $errorCode
     * @return self
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * Gets as errorMessage
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage
     *
     * @param string $errorMessage
     * @return self
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * Gets as partNumberInput
     *
     * @return string
     */
    public function getPartNumberInput()
    {
        return $this->partNumberInput;
    }

    /**
     * Sets a new partNumberInput
     *
     * @param string $partNumberInput
     * @return self
     */
    public function setPartNumberInput($partNumberInput)
    {
        $this->partNumberInput = $partNumberInput;
        return $this;
    }

    /**
     * Gets as requestedPart
     *
     * @return \App\Soap\cdk\src\PartsInventoryPricingResultRecordType
     */
    public function getRequestedPart()
    {
        return $this->requestedPart;
    }

    /**
     * Sets a new requestedPart
     *
     * @param \App\Soap\cdk\src\PartsInventoryPricingResultRecordType $requestedPart
     * @return self
     */
    public function setRequestedPart(\App\Soap\cdk\src\PartsInventoryPricingResultRecordType $requestedPart)
    {
        $this->requestedPart = $requestedPart;
        return $this;
    }

    /**
     * Adds as supersedePartChain
     *
     * @return self
     * @param \App\Soap\cdk\src\PartsInventoryPricingResultRecordType $supersedePartChain
     */
    public function addToSupersedePartChain(\App\Soap\cdk\src\PartsInventoryPricingResultRecordType $supersedePartChain)
    {
        $this->supersedePartChain[] = $supersedePartChain;
        return $this;
    }

    /**
     * isset supersedePartChain
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSupersedePartChain($index)
    {
        return isset($this->supersedePartChain[$index]);
    }

    /**
     * unset supersedePartChain
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSupersedePartChain($index)
    {
        unset($this->supersedePartChain[$index]);
    }

    /**
     * Gets as supersedePartChain
     *
     * @return \App\Soap\cdk\src\PartsInventoryPricingResultRecordType[]
     */
    public function getSupersedePartChain()
    {
        return $this->supersedePartChain;
    }

    /**
     * Sets a new supersedePartChain
     *
     * @param \App\Soap\cdk\src\PartsInventoryPricingResultRecordType[] $supersedePartChain
     * @return self
     */
    public function setSupersedePartChain(array $supersedePartChain)
    {
        $this->supersedePartChain = $supersedePartChain;
        return $this;
    }


}

