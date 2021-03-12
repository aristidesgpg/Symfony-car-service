<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ArrayOfPartsOrderLineType
 *
 * 
 * XSD Type: ArrayOfPartsOrderLine
 */
class ArrayOfPartsOrderLineType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType[] $partsOrderLine
     */
    private $partsOrderLine = [
        
    ];

    /**
     * Adds as partsOrderLine
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType $partsOrderLine
     */
    public function addToPartsOrderLine(\App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType $partsOrderLine)
    {
        $this->partsOrderLine[] = $partsOrderLine;
        return $this;
    }

    /**
     * isset partsOrderLine
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsOrderLine($index)
    {
        return isset($this->partsOrderLine[$index]);
    }

    /**
     * unset partsOrderLine
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsOrderLine($index)
    {
        unset($this->partsOrderLine[$index]);
    }

    /**
     * Gets as partsOrderLine
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType[]
     */
    public function getPartsOrderLine()
    {
        return $this->partsOrderLine;
    }

    /**
     * Sets a new partsOrderLine
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType[] $partsOrderLine
     * @return self
     */
    public function setPartsOrderLine(array $partsOrderLine)
    {
        $this->partsOrderLine = $partsOrderLine;
        return $this;
    }


}

