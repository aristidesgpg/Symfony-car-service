<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealerLocationsResponse
 */
class PullDealerLocationsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType[] $pullDealerLocationsResult
     */
    private $pullDealerLocationsResult = null;

    /**
     * Adds as serviceLocationPlacement
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType $serviceLocationPlacement
     */
    public function addToPullDealerLocationsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType $serviceLocationPlacement)
    {
        $this->pullDealerLocationsResult[] = $serviceLocationPlacement;
        return $this;
    }

    /**
     * isset pullDealerLocationsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullDealerLocationsResult($index)
    {
        return isset($this->pullDealerLocationsResult[$index]);
    }

    /**
     * unset pullDealerLocationsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullDealerLocationsResult($index)
    {
        unset($this->pullDealerLocationsResult[$index]);
    }

    /**
     * Gets as pullDealerLocationsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType[]
     */
    public function getPullDealerLocationsResult()
    {
        return $this->pullDealerLocationsResult;
    }

    /**
     * Sets a new pullDealerLocationsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType[] $pullDealerLocationsResult
     * @return self
     */
    public function setPullDealerLocationsResult(array $pullDealerLocationsResult)
    {
        $this->pullDealerLocationsResult = $pullDealerLocationsResult;
        return $this;
    }


}

