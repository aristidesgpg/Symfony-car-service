<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedPotentialTechsAttributesType
 *
 * 
 * XSD Type: ArrayOfPushedPotentialTechsAttributes
 */
class ArrayOfPushedPotentialTechsAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType[] $pushedPotentialTechsAttributes
     */
    private $pushedPotentialTechsAttributes = [
        
    ];

    /**
     * Adds as pushedPotentialTechsAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType $pushedPotentialTechsAttributes
     */
    public function addToPushedPotentialTechsAttributes(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType $pushedPotentialTechsAttributes)
    {
        $this->pushedPotentialTechsAttributes[] = $pushedPotentialTechsAttributes;
        return $this;
    }

    /**
     * isset pushedPotentialTechsAttributes
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushedPotentialTechsAttributes($index)
    {
        return isset($this->pushedPotentialTechsAttributes[$index]);
    }

    /**
     * unset pushedPotentialTechsAttributes
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushedPotentialTechsAttributes($index)
    {
        unset($this->pushedPotentialTechsAttributes[$index]);
    }

    /**
     * Gets as pushedPotentialTechsAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType[]
     */
    public function getPushedPotentialTechsAttributes()
    {
        return $this->pushedPotentialTechsAttributes;
    }

    /**
     * Sets a new pushedPotentialTechsAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType[] $pushedPotentialTechsAttributes
     * @return self
     */
    public function setPushedPotentialTechsAttributes(array $pushedPotentialTechsAttributes)
    {
        $this->pushedPotentialTechsAttributes = $pushedPotentialTechsAttributes;
        return $this;
    }


}

