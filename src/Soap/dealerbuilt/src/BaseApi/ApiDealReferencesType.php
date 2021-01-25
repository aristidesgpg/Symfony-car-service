<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiDealReferencesType
 *
 * 
 * XSD Type: ApiDealReferences
 */
class ApiDealReferencesType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $inventoryKey
     */
    private $inventoryKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\TradeInType[] $tradeIns
     */
    private $tradeIns = null;

    /**
     * Gets as customerKey
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param string $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }

    /**
     * Gets as inventoryKey
     *
     * @return string
     */
    public function getInventoryKey()
    {
        return $this->inventoryKey;
    }

    /**
     * Sets a new inventoryKey
     *
     * @param string $inventoryKey
     * @return self
     */
    public function setInventoryKey($inventoryKey)
    {
        $this->inventoryKey = $inventoryKey;
        return $this;
    }

    /**
     * Adds as tradeIn
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInType $tradeIn
     */
    public function addToTradeIns(\App\Soap\dealerbuilt\src\BaseApi\TradeInType $tradeIn)
    {
        $this->tradeIns[] = $tradeIn;
        return $this;
    }

    /**
     * isset tradeIns
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTradeIns($index)
    {
        return isset($this->tradeIns[$index]);
    }

    /**
     * unset tradeIns
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTradeIns($index)
    {
        unset($this->tradeIns[$index]);
    }

    /**
     * Gets as tradeIns
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\TradeInType[]
     */
    public function getTradeIns()
    {
        return $this->tradeIns;
    }

    /**
     * Sets a new tradeIns
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInType[] $tradeIns
     * @return self
     */
    public function setTradeIns(array $tradeIns)
    {
        $this->tradeIns = $tradeIns;
        return $this;
    }


}

