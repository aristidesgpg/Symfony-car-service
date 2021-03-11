<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPotentialPartPushRequestType
 *
 * 
 * XSD Type: ArrayOfPotentialPartPushRequest
 */
class ArrayOfPotentialPartPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType[] $potentialPartPushRequest
     */
    private $potentialPartPushRequest = [
        
    ];

    /**
     * Adds as potentialPartPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType $potentialPartPushRequest
     */
    public function addToPotentialPartPushRequest(\App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType $potentialPartPushRequest)
    {
        $this->potentialPartPushRequest[] = $potentialPartPushRequest;
        return $this;
    }

    /**
     * isset potentialPartPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPotentialPartPushRequest($index)
    {
        return isset($this->potentialPartPushRequest[$index]);
    }

    /**
     * unset potentialPartPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPotentialPartPushRequest($index)
    {
        unset($this->potentialPartPushRequest[$index]);
    }

    /**
     * Gets as potentialPartPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType[]
     */
    public function getPotentialPartPushRequest()
    {
        return $this->potentialPartPushRequest;
    }

    /**
     * Sets a new potentialPartPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType[] $potentialPartPushRequest
     * @return self
     */
    public function setPotentialPartPushRequest(array $potentialPartPushRequest)
    {
        $this->potentialPartPushRequest = $potentialPartPushRequest;
        return $this;
    }


}

