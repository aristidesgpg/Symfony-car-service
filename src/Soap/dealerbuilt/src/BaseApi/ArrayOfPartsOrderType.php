<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPartsOrderType
 *
 * 
 * XSD Type: ArrayOfPartsOrder
 */
class ArrayOfPartsOrderType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[] $partsOrder
     */
    private $partsOrder = [
        
    ];

    /**
     * Adds as partsOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType $partsOrder
     */
    public function addToPartsOrder(\App\Soap\dealerbuilt\src\BaseApi\PartsOrderType $partsOrder)
    {
        $this->partsOrder[] = $partsOrder;
        return $this;
    }

    /**
     * isset partsOrder
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsOrder($index)
    {
        return isset($this->partsOrder[$index]);
    }

    /**
     * unset partsOrder
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsOrder($index)
    {
        unset($this->partsOrder[$index]);
    }

    /**
     * Gets as partsOrder
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[]
     */
    public function getPartsOrder()
    {
        return $this->partsOrder;
    }

    /**
     * Sets a new partsOrder
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[] $partsOrder
     * @return self
     */
    public function setPartsOrder(array $partsOrder)
    {
        $this->partsOrder = $partsOrder;
        return $this;
    }


}

