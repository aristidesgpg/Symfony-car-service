<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushAppraisals.
 */
class PushAppraisals
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType[]
     */
    private $appraisals = null;

    /**
     * Adds as appraisalPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType $appraisalPushRequest
     */
    public function addToAppraisals(BaseApi\AppraisalPushRequestType $appraisalPushRequest)
    {
        $this->appraisals[] = $appraisalPushRequest;

        return $this;
    }

    /**
     * isset appraisals.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetAppraisals($index)
    {
        return isset($this->appraisals[$index]);
    }

    /**
     * unset appraisals.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetAppraisals($index)
    {
        unset($this->appraisals[$index]);
    }

    /**
     * Gets as appraisals.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType[]
     */
    public function getAppraisals()
    {
        return $this->appraisals;
    }

    /**
     * Sets a new appraisals.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppraisalPushRequestType[] $appraisals
     *
     * @return self
     */
    public function setAppraisals(array $appraisals)
    {
        $this->appraisals = $appraisals;

        return $this;
    }
}
