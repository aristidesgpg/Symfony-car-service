<?php

namespace App\Soap\cdk\src;

/**
 * Class representing ServiceRODetailOpen
 */
class ServiceRODetailOpen
{

    /**
     * @var \App\Soap\cdk\src\ServiceRepairOrderOpen[] $serviceRepairOrderOpen
     */
    private $serviceRepairOrderOpen = [
        
    ];

    /**
     * @var int $errorCode
     */
    private $errorCode = null;

    /**
     * @var \App\Soap\cdk\src\ErrorMessage $errorMessage
     */
    private $errorMessage = null;

    /**
     * Adds as serviceRepairOrderOpen
     *
     * @return self
     * @param \App\Soap\cdk\src\ServiceRepairOrderOpen $serviceRepairOrderOpen
     */
    public function addToServiceRepairOrderOpen(\App\Soap\cdk\src\ServiceRepairOrderOpen $serviceRepairOrderOpen)
    {
        $this->serviceRepairOrderOpen[] = $serviceRepairOrderOpen;
        return $this;
    }

    /**
     * isset serviceRepairOrderOpen
     *
     * @param int|string $index
     * @return bool
     */
    public function issetServiceRepairOrderOpen($index)
    {
        return isset($this->serviceRepairOrderOpen[$index]);
    }

    /**
     * unset serviceRepairOrderOpen
     *
     * @param int|string $index
     * @return void
     */
    public function unsetServiceRepairOrderOpen($index)
    {
        unset($this->serviceRepairOrderOpen[$index]);
    }

    /**
     * Gets as serviceRepairOrderOpen
     *
     * @return \App\Soap\cdk\src\ServiceRepairOrderOpen[]
     */
    public function getServiceRepairOrderOpen()
    {
        return $this->serviceRepairOrderOpen;
    }

    /**
     * Sets a new serviceRepairOrderOpen
     *
     * @param \App\Soap\cdk\src\ServiceRepairOrderOpen[] $serviceRepairOrderOpen
     * @return self
     */
    public function setServiceRepairOrderOpen(array $serviceRepairOrderOpen)
    {
        $this->serviceRepairOrderOpen = $serviceRepairOrderOpen;
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
     * @return \App\Soap\cdk\src\ErrorMessage
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage
     *
     * @param \App\Soap\cdk\src\ErrorMessage $errorMessage
     * @return self
     */
    public function setErrorMessage(\App\Soap\cdk\src\ErrorMessage $errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


}

