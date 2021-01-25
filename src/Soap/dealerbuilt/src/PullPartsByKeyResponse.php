<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsByKeyResponse.
 */
class PullPartsByKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[]
     */
    private $pullPartsByKeyResult = null;

    /**
     * Adds as inventoryPart.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $inventoryPart
     */
    public function addToPullPartsByKeyResult(BaseApi\InventoryPartType $inventoryPart)
    {
        $this->pullPartsByKeyResult[] = $inventoryPart;

        return $this;
    }

    /**
     * isset pullPartsByKeyResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullPartsByKeyResult($index)
    {
        return isset($this->pullPartsByKeyResult[$index]);
    }

    /**
     * unset pullPartsByKeyResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullPartsByKeyResult($index)
    {
        unset($this->pullPartsByKeyResult[$index]);
    }

    /**
     * Gets as pullPartsByKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[]
     */
    public function getPullPartsByKeyResult()
    {
        return $this->pullPartsByKeyResult;
    }

    /**
     * Sets a new pullPartsByKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[] $pullPartsByKeyResult
     *
     * @return self
     */
    public function setPullPartsByKeyResult(array $pullPartsByKeyResult)
    {
        $this->pullPartsByKeyResult = $pullPartsByKeyResult;

        return $this;
    }
}
