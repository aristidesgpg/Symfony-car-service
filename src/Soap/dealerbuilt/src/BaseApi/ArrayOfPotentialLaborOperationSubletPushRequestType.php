<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPotentialLaborOperationSubletPushRequestType.
 *
 * XSD Type: ArrayOfPotentialLaborOperationSubletPushRequest
 */
class ArrayOfPotentialLaborOperationSubletPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType[]
     */
    private $potentialLaborOperationSubletPushRequest = [
    ];

    /**
     * Adds as potentialLaborOperationSubletPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType $potentialLaborOperationSubletPushRequest
     */
    public function addToPotentialLaborOperationSubletPushRequest(PotentialLaborOperationSubletPushRequestType $potentialLaborOperationSubletPushRequest)
    {
        $this->potentialLaborOperationSubletPushRequest[] = $potentialLaborOperationSubletPushRequest;

        return $this;
    }

    /**
     * isset potentialLaborOperationSubletPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPotentialLaborOperationSubletPushRequest($index)
    {
        return isset($this->potentialLaborOperationSubletPushRequest[$index]);
    }

    /**
     * unset potentialLaborOperationSubletPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPotentialLaborOperationSubletPushRequest($index)
    {
        unset($this->potentialLaborOperationSubletPushRequest[$index]);
    }

    /**
     * Gets as potentialLaborOperationSubletPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType[]
     */
    public function getPotentialLaborOperationSubletPushRequest()
    {
        return $this->potentialLaborOperationSubletPushRequest;
    }

    /**
     * Sets a new potentialLaborOperationSubletPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType[] $potentialLaborOperationSubletPushRequest
     *
     * @return self
     */
    public function setPotentialLaborOperationSubletPushRequest(array $potentialLaborOperationSubletPushRequest)
    {
        $this->potentialLaborOperationSubletPushRequest = $potentialLaborOperationSubletPushRequest;

        return $this;
    }
}
