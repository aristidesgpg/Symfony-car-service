<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPotentialLaborItemPushRequestType
 *
 * 
 * XSD Type: ArrayOfPotentialLaborItemPushRequest
 */
class ArrayOfPotentialLaborItemPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType[] $potentialLaborItemPushRequest
     */
    private $potentialLaborItemPushRequest = [
        
    ];

    /**
     * Adds as potentialLaborItemPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType $potentialLaborItemPushRequest
     */
    public function addToPotentialLaborItemPushRequest(\App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType $potentialLaborItemPushRequest)
    {
        $this->potentialLaborItemPushRequest[] = $potentialLaborItemPushRequest;
        return $this;
    }

    /**
     * isset potentialLaborItemPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPotentialLaborItemPushRequest($index)
    {
        return isset($this->potentialLaborItemPushRequest[$index]);
    }

    /**
     * unset potentialLaborItemPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPotentialLaborItemPushRequest($index)
    {
        unset($this->potentialLaborItemPushRequest[$index]);
    }

    /**
     * Gets as potentialLaborItemPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType[]
     */
    public function getPotentialLaborItemPushRequest()
    {
        return $this->potentialLaborItemPushRequest;
    }

    /**
     * Sets a new potentialLaborItemPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType[] $potentialLaborItemPushRequest
     * @return self
     */
    public function setPotentialLaborItemPushRequest(array $potentialLaborItemPushRequest)
    {
        $this->potentialLaborItemPushRequest = $potentialLaborItemPushRequest;
        return $this;
    }


}

