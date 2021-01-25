<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedPotentialJobAttributesType
 *
 * 
 * XSD Type: ArrayOfPushedPotentialJobAttributes
 */
class ArrayOfPushedPotentialJobAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[] $pushedPotentialJobAttributes
     */
    private $pushedPotentialJobAttributes = [
        
    ];

    /**
     * Adds as pushedPotentialJobAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType $pushedPotentialJobAttributes
     */
    public function addToPushedPotentialJobAttributes(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType $pushedPotentialJobAttributes)
    {
        $this->pushedPotentialJobAttributes[] = $pushedPotentialJobAttributes;
        return $this;
    }

    /**
     * isset pushedPotentialJobAttributes
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushedPotentialJobAttributes($index)
    {
        return isset($this->pushedPotentialJobAttributes[$index]);
    }

    /**
     * unset pushedPotentialJobAttributes
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushedPotentialJobAttributes($index)
    {
        unset($this->pushedPotentialJobAttributes[$index]);
    }

    /**
     * Gets as pushedPotentialJobAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[]
     */
    public function getPushedPotentialJobAttributes()
    {
        return $this->pushedPotentialJobAttributes;
    }

    /**
     * Sets a new pushedPotentialJobAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[] $pushedPotentialJobAttributes
     * @return self
     */
    public function setPushedPotentialJobAttributes(array $pushedPotentialJobAttributes)
    {
        $this->pushedPotentialJobAttributes = $pushedPotentialJobAttributes;
        return $this;
    }


}

