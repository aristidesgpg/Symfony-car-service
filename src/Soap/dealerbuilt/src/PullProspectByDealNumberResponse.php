<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullProspectByDealNumberResponse.
 */
class PullProspectByDealNumberResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProspectType
     */
    private $pullProspectByDealNumberResult = null;

    /**
     * Gets as pullProspectByDealNumberResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProspectType
     */
    public function getPullProspectByDealNumberResult()
    {
        return $this->pullProspectByDealNumberResult;
    }

    /**
     * Sets a new pullProspectByDealNumberResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectType $pullProspectByDealNumberResult
     *
     * @return self
     */
    public function setPullProspectByDealNumberResult(BaseApi\ProspectType $pullProspectByDealNumberResult)
    {
        $this->pullProspectByDealNumberResult = $pullProspectByDealNumberResult;

        return $this;
    }
}
