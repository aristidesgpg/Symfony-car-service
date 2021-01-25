<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfLaborItemPushResponseType.
 *
 * XSD Type: ArrayOfLaborItemPushResponse
 */
class ArrayOfLaborItemPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[]
     */
    private $laborItemPushResponse = [
    ];

    /**
     * Adds as laborItemPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType $laborItemPushResponse
     */
    public function addToLaborItemPushResponse(LaborItemPushResponseType $laborItemPushResponse)
    {
        $this->laborItemPushResponse[] = $laborItemPushResponse;

        return $this;
    }

    /**
     * isset laborItemPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLaborItemPushResponse($index)
    {
        return isset($this->laborItemPushResponse[$index]);
    }

    /**
     * unset laborItemPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLaborItemPushResponse($index)
    {
        unset($this->laborItemPushResponse[$index]);
    }

    /**
     * Gets as laborItemPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[]
     */
    public function getLaborItemPushResponse()
    {
        return $this->laborItemPushResponse;
    }

    /**
     * Sets a new laborItemPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[] $laborItemPushResponse
     *
     * @return self
     */
    public function setLaborItemPushResponse(array $laborItemPushResponse)
    {
        $this->laborItemPushResponse = $laborItemPushResponse;

        return $this;
    }
}
