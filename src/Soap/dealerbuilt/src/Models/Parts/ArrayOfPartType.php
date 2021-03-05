<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ArrayOfPartType
 *
 * 
 * XSD Type: ArrayOfPart
 */
class ArrayOfPartType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartType[] $part
     */
    private $part = [
        
    ];

    /**
     * Adds as part
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartType $part
     */
    public function addToPart(\App\Soap\dealerbuilt\src\Models\Parts\PartType $part)
    {
        $this->part[] = $part;
        return $this;
    }

    /**
     * isset part
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPart($index)
    {
        return isset($this->part[$index]);
    }

    /**
     * unset part
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPart($index)
    {
        unset($this->part[$index]);
    }

    /**
     * Gets as part
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartType[]
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Sets a new part
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartType[] $part
     * @return self
     */
    public function setPart(array $part)
    {
        $this->part = $part;
        return $this;
    }


}

