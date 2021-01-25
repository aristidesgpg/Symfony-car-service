<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushProspects.
 */
class PushProspects
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType[]
     */
    private $prospects = null;

    /**
     * Adds as prospectPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType $prospectPushRequest
     */
    public function addToProspects(BaseApi\ProspectPushRequestType $prospectPushRequest)
    {
        $this->prospects[] = $prospectPushRequest;

        return $this;
    }

    /**
     * isset prospects.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetProspects($index)
    {
        return isset($this->prospects[$index]);
    }

    /**
     * unset prospects.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetProspects($index)
    {
        unset($this->prospects[$index]);
    }

    /**
     * Gets as prospects.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType[]
     */
    public function getProspects()
    {
        return $this->prospects;
    }

    /**
     * Sets a new prospects.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectPushRequestType[] $prospects
     *
     * @return self
     */
    public function setProspects(array $prospects)
    {
        $this->prospects = $prospects;

        return $this;
    }
}
