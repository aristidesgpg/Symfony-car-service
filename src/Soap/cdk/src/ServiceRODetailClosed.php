<?php

namespace App\Soap\cdk\src;

/**
 * Class representing ServiceRODetailOpen
 */
class ServiceRODetailClosed
{

    /**
     * @var \App\Soap\cdk\src\ServiceRepairOrderClosed[] $serviceRepairOrderClosed
     */
    private $serviceRepairOrderClosed = [
        
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
     * Adds as serviceRepairOrderClosed
     *
     * @return self
     * @param \App\Soap\cdk\src\ServiceRepairOrderClosed $serviceRepairOrderClosed
     */
    public function addToServiceRepairOrderClosed(\App\Soap\cdk\src\ServiceRepairOrderClosed $serviceRepairOrderClosed)
    {
        $this->serviceRepairOrderClosed[] = $serviceRepairOrderClosed;
        return $this;
    }

    /**
     * isset serviceRepairOrderClosed
     *
     * @param int|string $index
     * @return bool
     */
    public function issetServiceRepairOrderClosed($index)
    {
        return isset($this->serviceRepairOrderClosed[$index]);
    }

    /**
     * unset serviceRepairOrderClosed
     *
     * @param int|string $index
     * @return void
     */
    public function unsetServiceRepairOrderClosed($index)
    {
        unset($this->serviceRepairOrderClosed[$index]);
    }

    /**
     * Gets as serviceRepairOrderClosed
     *
     * @return \App\Soap\cdk\src\ServiceRepairOrderClosed[]
     */
    public function getServiceRepairOrderClosed()
    {
        return $this->serviceRepairOrderClosed;
    }

    /**
     * Sets a new serviceRepairOrderClosed
     *
     * @param \App\Soap\cdk\src\ServiceRepairOrderClosed[] $serviceRepairOrderClosed
     * @return self
     */
    public function setServiceRepairOrderClosed(array $serviceRepairOrderClosed)
    {
        $this->serviceRepairOrderClosed = $serviceRepairOrderClosed;
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

