<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushGeneralJournalAccounting.
 */
class PushGeneralJournalAccounting
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePushType
     */
    private $request = null;

    /**
     * Gets as request.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePushType
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets a new request.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushType $request
     *
     * @return self
     */
    public function setRequest(BaseApi\StorePushType $request)
    {
        $this->request = $request;

        return $this;
    }
}
