<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfServiceLocationPushResponseType.
 *
 * XSD Type: ArrayOfServiceLocationPushResponse
 */
class ArrayOfServiceLocationPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    private $serviceLocationPushResponse = [
    ];

    /**
     * Adds as serviceLocationPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToServiceLocationPushResponse(ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->serviceLocationPushResponse[] = $serviceLocationPushResponse;

        return $this;
    }

    /**
     * isset serviceLocationPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceLocationPushResponse($index)
    {
        return isset($this->serviceLocationPushResponse[$index]);
    }

    /**
     * unset serviceLocationPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceLocationPushResponse($index)
    {
        unset($this->serviceLocationPushResponse[$index]);
    }

    /**
     * Gets as serviceLocationPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getServiceLocationPushResponse()
    {
        return $this->serviceLocationPushResponse;
    }

    /**
     * Sets a new serviceLocationPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $serviceLocationPushResponse
     *
     * @return self
     */
    public function setServiceLocationPushResponse(array $serviceLocationPushResponse)
    {
        $this->serviceLocationPushResponse = $serviceLocationPushResponse;

        return $this;
    }
}
