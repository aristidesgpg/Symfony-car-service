<?php

namespace App\Soap\dealerbuilt\src\Models\ServiceContracts;

/**
 * Class representing ArrayOfServiceContractType.
 *
 * XSD Type: ArrayOfServiceContract
 */
class ArrayOfServiceContractType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType[]
     */
    private $serviceContract = [
    ];

    /**
     * Adds as serviceContract.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType $serviceContract
     */
    public function addToServiceContract(ServiceContractType $serviceContract)
    {
        $this->serviceContract[] = $serviceContract;

        return $this;
    }

    /**
     * isset serviceContract.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceContract($index)
    {
        return isset($this->serviceContract[$index]);
    }

    /**
     * unset serviceContract.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceContract($index)
    {
        unset($this->serviceContract[$index]);
    }

    /**
     * Gets as serviceContract.
     *
     * @return \App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType[]
     */
    public function getServiceContract()
    {
        return $this->serviceContract;
    }

    /**
     * Sets a new serviceContract.
     *
     * @param \App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType[] $serviceContract
     *
     * @return self
     */
    public function setServiceContract(array $serviceContract)
    {
        $this->serviceContract = $serviceContract;

        return $this;
    }
}
