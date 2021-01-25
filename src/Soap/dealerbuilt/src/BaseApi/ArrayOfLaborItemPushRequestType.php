<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfLaborItemPushRequestType.
 *
 * XSD Type: ArrayOfLaborItemPushRequest
 */
class ArrayOfLaborItemPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType[]
     */
    private $laborItemPushRequest = [
    ];

    /**
     * Adds as laborItemPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType $laborItemPushRequest
     */
    public function addToLaborItemPushRequest(LaborItemPushRequestType $laborItemPushRequest)
    {
        $this->laborItemPushRequest[] = $laborItemPushRequest;

        return $this;
    }

    /**
     * isset laborItemPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLaborItemPushRequest($index)
    {
        return isset($this->laborItemPushRequest[$index]);
    }

    /**
     * unset laborItemPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLaborItemPushRequest($index)
    {
        unset($this->laborItemPushRequest[$index]);
    }

    /**
     * Gets as laborItemPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType[]
     */
    public function getLaborItemPushRequest()
    {
        return $this->laborItemPushRequest;
    }

    /**
     * Sets a new laborItemPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType[] $laborItemPushRequest
     *
     * @return self
     */
    public function setLaborItemPushRequest(array $laborItemPushRequest)
    {
        $this->laborItemPushRequest = $laborItemPushRequest;

        return $this;
    }
}
