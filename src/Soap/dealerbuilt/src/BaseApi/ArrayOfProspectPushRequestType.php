<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfProspectPushRequestType.
 *
 * XSD Type: ArrayOfProspectPushRequest
 */
class ArrayOfProspectPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType[]
     */
    private $prospectPushRequest = [
    ];

    /**
     * Adds as prospectPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType $prospectPushRequest
     */
    public function addToProspectPushRequest(ProspectPushRequestType $prospectPushRequest)
    {
        $this->prospectPushRequest[] = $prospectPushRequest;

        return $this;
    }

    /**
     * isset prospectPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetProspectPushRequest($index)
    {
        return isset($this->prospectPushRequest[$index]);
    }

    /**
     * unset prospectPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetProspectPushRequest($index)
    {
        unset($this->prospectPushRequest[$index]);
    }

    /**
     * Gets as prospectPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType[]
     */
    public function getProspectPushRequest()
    {
        return $this->prospectPushRequest;
    }

    /**
     * Sets a new prospectPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType[] $prospectPushRequest
     *
     * @return self
     */
    public function setProspectPushRequest(array $prospectPushRequest)
    {
        $this->prospectPushRequest = $prospectPushRequest;

        return $this;
    }
}
