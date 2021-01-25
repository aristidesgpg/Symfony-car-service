<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPurchaseOrdersResponse.
 */
class PullPurchaseOrdersResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType[]
     */
    private $pullPurchaseOrdersResult = null;

    /**
     * Adds as purchaseOrder.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType $purchaseOrder
     */
    public function addToPullPurchaseOrdersResult(BaseApi\PurchaseOrderType $purchaseOrder)
    {
        $this->pullPurchaseOrdersResult[] = $purchaseOrder;

        return $this;
    }

    /**
     * isset pullPurchaseOrdersResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullPurchaseOrdersResult($index)
    {
        return isset($this->pullPurchaseOrdersResult[$index]);
    }

    /**
     * unset pullPurchaseOrdersResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullPurchaseOrdersResult($index)
    {
        unset($this->pullPurchaseOrdersResult[$index]);
    }

    /**
     * Gets as pullPurchaseOrdersResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType[]
     */
    public function getPullPurchaseOrdersResult()
    {
        return $this->pullPurchaseOrdersResult;
    }

    /**
     * Sets a new pullPurchaseOrdersResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType[] $pullPurchaseOrdersResult
     *
     * @return self
     */
    public function setPullPurchaseOrdersResult(array $pullPurchaseOrdersResult)
    {
        $this->pullPurchaseOrdersResult = $pullPurchaseOrdersResult;

        return $this;
    }
}
