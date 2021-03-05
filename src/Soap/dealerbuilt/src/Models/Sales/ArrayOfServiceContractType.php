<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfServiceContractType
 *
 * 
 * XSD Type: ArrayOfServiceContract
 */
class ArrayOfServiceContractType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType[] $serviceContract
     */
    private $serviceContract = [
        
    ];

    /**
     * Adds as serviceContract
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType $serviceContract
     */
    public function addToServiceContract(\App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType $serviceContract)
    {
        $this->serviceContract[] = $serviceContract;
        return $this;
    }

    /**
     * isset serviceContract
     *
     * @param int|string $index
     * @return bool
     */
    public function issetServiceContract($index)
    {
        return isset($this->serviceContract[$index]);
    }

    /**
     * unset serviceContract
     *
     * @param int|string $index
     * @return void
     */
    public function unsetServiceContract($index)
    {
        unset($this->serviceContract[$index]);
    }

    /**
     * Gets as serviceContract
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType[]
     */
    public function getServiceContract()
    {
        return $this->serviceContract;
    }

    /**
     * Sets a new serviceContract
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ServiceContractType[] $serviceContract
     * @return self
     */
    public function setServiceContract(array $serviceContract)
    {
        $this->serviceContract = $serviceContract;
        return $this;
    }


}

