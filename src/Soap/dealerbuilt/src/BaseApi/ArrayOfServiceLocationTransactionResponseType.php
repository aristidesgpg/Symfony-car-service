<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfServiceLocationTransactionResponseType.
 *
 * XSD Type: ArrayOfServiceLocationTransactionResponse
 */
class ArrayOfServiceLocationTransactionResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[]
     */
    private $serviceLocationTransactionResponse = [
    ];

    /**
     * Adds as serviceLocationTransactionResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType $serviceLocationTransactionResponse
     */
    public function addToServiceLocationTransactionResponse(ServiceLocationTransactionResponseType $serviceLocationTransactionResponse)
    {
        $this->serviceLocationTransactionResponse[] = $serviceLocationTransactionResponse;

        return $this;
    }

    /**
     * isset serviceLocationTransactionResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceLocationTransactionResponse($index)
    {
        return isset($this->serviceLocationTransactionResponse[$index]);
    }

    /**
     * unset serviceLocationTransactionResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceLocationTransactionResponse($index)
    {
        unset($this->serviceLocationTransactionResponse[$index]);
    }

    /**
     * Gets as serviceLocationTransactionResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[]
     */
    public function getServiceLocationTransactionResponse()
    {
        return $this->serviceLocationTransactionResponse;
    }

    /**
     * Sets a new serviceLocationTransactionResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[] $serviceLocationTransactionResponse
     *
     * @return self
     */
    public function setServiceLocationTransactionResponse(array $serviceLocationTransactionResponse)
    {
        $this->serviceLocationTransactionResponse = $serviceLocationTransactionResponse;

        return $this;
    }
}
