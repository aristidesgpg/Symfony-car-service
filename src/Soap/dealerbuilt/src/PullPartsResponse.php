<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsResponse
 */
class PullPartsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[] $pullPartsResult
     */
    private $pullPartsResult = null;

    /**
     * Adds as inventoryPart
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $inventoryPart
     */
    public function addToPullPartsResult(\App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $inventoryPart)
    {
        $this->pullPartsResult[] = $inventoryPart;
        return $this;
    }

    /**
     * isset pullPartsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullPartsResult($index)
    {
        return isset($this->pullPartsResult[$index]);
    }

    /**
     * unset pullPartsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullPartsResult($index)
    {
        unset($this->pullPartsResult[$index]);
    }

    /**
     * Gets as pullPartsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[]
     */
    public function getPullPartsResult()
    {
        return $this->pullPartsResult;
    }

    /**
     * Sets a new pullPartsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[] $pullPartsResult
     * @return self
     */
    public function setPullPartsResult(array $pullPartsResult)
    {
        $this->pullPartsResult = $pullPartsResult;
        return $this;
    }


}

