<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPotentialLaborItemPushResponseType.
 *
 * XSD Type: ArrayOfPotentialLaborItemPushResponse
 */
class ArrayOfPotentialLaborItemPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[]
     */
    private $potentialLaborItemPushResponse = [
    ];

    /**
     * Adds as potentialLaborItemPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType $potentialLaborItemPushResponse
     */
    public function addToPotentialLaborItemPushResponse(PotentialLaborItemPushResponseType $potentialLaborItemPushResponse)
    {
        $this->potentialLaborItemPushResponse[] = $potentialLaborItemPushResponse;

        return $this;
    }

    /**
     * isset potentialLaborItemPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPotentialLaborItemPushResponse($index)
    {
        return isset($this->potentialLaborItemPushResponse[$index]);
    }

    /**
     * unset potentialLaborItemPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPotentialLaborItemPushResponse($index)
    {
        unset($this->potentialLaborItemPushResponse[$index]);
    }

    /**
     * Gets as potentialLaborItemPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[]
     */
    public function getPotentialLaborItemPushResponse()
    {
        return $this->potentialLaborItemPushResponse;
    }

    /**
     * Sets a new potentialLaborItemPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[] $potentialLaborItemPushResponse
     *
     * @return self
     */
    public function setPotentialLaborItemPushResponse(array $potentialLaborItemPushResponse)
    {
        $this->potentialLaborItemPushResponse = $potentialLaborItemPushResponse;

        return $this;
    }
}
