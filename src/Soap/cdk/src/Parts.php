<?php

namespace App\Soap\cdk\src;

/**
 * Class representing Parts
 */
class Parts
{

    /**
     * @var \App\Soap\cdk\src\Parts\PartsInventoryAType[] $partsInventory
     */
    private $partsInventory = [
        
    ];

    /**
     * @var int $errorCode
     */
    private $errorCode = null;

    /**
     * @var mixed $errorMessage
     */
    private $errorMessage = null;

    /**
     * Adds as partsInventory
     *
     * @return self
     * @param \App\Soap\cdk\src\Parts\PartsInventoryAType $partsInventory
     */
    public function addToPartsInventory(\App\Soap\cdk\src\Parts\PartsInventoryAType $partsInventory)
    {
        $this->partsInventory[] = $partsInventory;
        return $this;
    }

    /**
     * isset partsInventory
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsInventory($index)
    {
        return isset($this->partsInventory[$index]);
    }

    /**
     * unset partsInventory
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsInventory($index)
    {
        unset($this->partsInventory[$index]);
    }

    /**
     * Gets as partsInventory
     *
     * @return \App\Soap\cdk\src\Parts\PartsInventoryAType[]
     */
    public function getPartsInventory()
    {
        return $this->partsInventory;
    }

    /**
     * Sets a new partsInventory
     *
     * @param \App\Soap\cdk\src\Parts\PartsInventoryAType[] $partsInventory
     * @return self
     */
    public function setPartsInventory(array $partsInventory)
    {
        $this->partsInventory = $partsInventory;
        return $this;
    }

    /**
     * Gets as errorCode
     *
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Sets a new errorCode
     *
     * @param int $errorCode
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
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage
     *
     * @param mixed $errorMessage
     * @return self
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


}

