<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullOemServiceProfileResponse.
 */
class PullOemServiceProfileResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType
     */
    private $pullOemServiceProfileResult = null;

    /**
     * Gets as pullOemServiceProfileResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType
     */
    public function getPullOemServiceProfileResult()
    {
        return $this->pullOemServiceProfileResult;
    }

    /**
     * Sets a new pullOemServiceProfileResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\OemServiceProfileType $pullOemServiceProfileResult
     *
     * @return self
     */
    public function setPullOemServiceProfileResult(BaseApi\OemServiceProfileType $pullOemServiceProfileResult)
    {
        $this->pullOemServiceProfileResult = $pullOemServiceProfileResult;

        return $this;
    }
}
