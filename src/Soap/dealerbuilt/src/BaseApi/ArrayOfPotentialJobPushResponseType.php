<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPotentialJobPushResponseType.
 *
 * XSD Type: ArrayOfPotentialJobPushResponse
 */
class ArrayOfPotentialJobPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[]
     */
    private $potentialJobPushResponse = [
    ];

    /**
     * Adds as potentialJobPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType $potentialJobPushResponse
     */
    public function addToPotentialJobPushResponse(PotentialJobPushResponseType $potentialJobPushResponse)
    {
        $this->potentialJobPushResponse[] = $potentialJobPushResponse;

        return $this;
    }

    /**
     * isset potentialJobPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPotentialJobPushResponse($index)
    {
        return isset($this->potentialJobPushResponse[$index]);
    }

    /**
     * unset potentialJobPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPotentialJobPushResponse($index)
    {
        unset($this->potentialJobPushResponse[$index]);
    }

    /**
     * Gets as potentialJobPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[]
     */
    public function getPotentialJobPushResponse()
    {
        return $this->potentialJobPushResponse;
    }

    /**
     * Sets a new potentialJobPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[] $potentialJobPushResponse
     *
     * @return self
     */
    public function setPotentialJobPushResponse(array $potentialJobPushResponse)
    {
        $this->potentialJobPushResponse = $potentialJobPushResponse;

        return $this;
    }
}
