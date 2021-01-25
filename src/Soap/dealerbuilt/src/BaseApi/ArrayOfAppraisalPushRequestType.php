<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfAppraisalPushRequestType.
 *
 * XSD Type: ArrayOfAppraisalPushRequest
 */
class ArrayOfAppraisalPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType[]
     */
    private $appraisalPushRequest = [
    ];

    /**
     * Adds as appraisalPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType $appraisalPushRequest
     */
    public function addToAppraisalPushRequest(AppraisalPushRequestType $appraisalPushRequest)
    {
        $this->appraisalPushRequest[] = $appraisalPushRequest;

        return $this;
    }

    /**
     * isset appraisalPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetAppraisalPushRequest($index)
    {
        return isset($this->appraisalPushRequest[$index]);
    }

    /**
     * unset appraisalPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetAppraisalPushRequest($index)
    {
        unset($this->appraisalPushRequest[$index]);
    }

    /**
     * Gets as appraisalPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType[]
     */
    public function getAppraisalPushRequest()
    {
        return $this->appraisalPushRequest;
    }

    /**
     * Sets a new appraisalPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType[] $appraisalPushRequest
     *
     * @return self
     */
    public function setAppraisalPushRequest(array $appraisalPushRequest)
    {
        $this->appraisalPushRequest = $appraisalPushRequest;

        return $this;
    }
}
