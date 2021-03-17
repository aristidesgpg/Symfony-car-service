<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPurchaseOrderType
 *
 * 
 * XSD Type: ArrayOfPurchaseOrder
 */
class ArrayOfPurchaseOrderType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType[] $purchaseOrder
     */
    private $purchaseOrder = [
        
    ];

    /**
     * Adds as purchaseOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType $purchaseOrder
     */
    public function addToPurchaseOrder(\App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType $purchaseOrder)
    {
        $this->purchaseOrder[] = $purchaseOrder;
        return $this;
    }

    /**
     * isset purchaseOrder
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPurchaseOrder($index)
    {
        return isset($this->purchaseOrder[$index]);
    }

    /**
     * unset purchaseOrder
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPurchaseOrder($index)
    {
        unset($this->purchaseOrder[$index]);
    }

    /**
     * Gets as purchaseOrder
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType[]
     */
    public function getPurchaseOrder()
    {
        return $this->purchaseOrder;
    }

    /**
     * Sets a new purchaseOrder
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PurchaseOrderType[] $purchaseOrder
     * @return self
     */
    public function setPurchaseOrder(array $purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;
        return $this;
    }


}

