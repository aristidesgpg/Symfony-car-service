<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsByPartNumberResponse.
 */
class PullPartsByPartNumberResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[]
     */
    private $pullPartsByPartNumberResult = null;

    /**
     * Adds as inventoryPart.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $inventoryPart
     */
    public function addToPullPartsByPartNumberResult(BaseApi\InventoryPartType $inventoryPart)
    {
        $this->pullPartsByPartNumberResult[] = $inventoryPart;

        return $this;
    }

    /**
     * isset pullPartsByPartNumberResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullPartsByPartNumberResult($index)
    {
        return isset($this->pullPartsByPartNumberResult[$index]);
    }

    /**
     * unset pullPartsByPartNumberResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullPartsByPartNumberResult($index)
    {
        unset($this->pullPartsByPartNumberResult[$index]);
    }

    /**
     * Gets as pullPartsByPartNumberResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[]
     */
    public function getPullPartsByPartNumberResult()
    {
        return $this->pullPartsByPartNumberResult;
    }

    /**
     * Sets a new pullPartsByPartNumberResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[] $pullPartsByPartNumberResult
     *
     * @return self
     */
    public function setPullPartsByPartNumberResult(array $pullPartsByPartNumberResult)
    {
        $this->pullPartsByPartNumberResult = $pullPartsByPartNumberResult;

        return $this;
    }
}
