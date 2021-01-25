<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedLaborItemAttributesType
 *
 * 
 * XSD Type: ArrayOfPushedLaborItemAttributes
 */
class ArrayOfPushedLaborItemAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType[] $pushedLaborItemAttributes
     */
    private $pushedLaborItemAttributes = [
        
    ];

    /**
     * Adds as pushedLaborItemAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType $pushedLaborItemAttributes
     */
    public function addToPushedLaborItemAttributes(\App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType $pushedLaborItemAttributes)
    {
        $this->pushedLaborItemAttributes[] = $pushedLaborItemAttributes;
        return $this;
    }

    /**
     * isset pushedLaborItemAttributes
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushedLaborItemAttributes($index)
    {
        return isset($this->pushedLaborItemAttributes[$index]);
    }

    /**
     * unset pushedLaborItemAttributes
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushedLaborItemAttributes($index)
    {
        unset($this->pushedLaborItemAttributes[$index]);
    }

    /**
     * Gets as pushedLaborItemAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType[]
     */
    public function getPushedLaborItemAttributes()
    {
        return $this->pushedLaborItemAttributes;
    }

    /**
     * Sets a new pushedLaborItemAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType[] $pushedLaborItemAttributes
     * @return self
     */
    public function setPushedLaborItemAttributes(array $pushedLaborItemAttributes)
    {
        $this->pushedLaborItemAttributes = $pushedLaborItemAttributes;
        return $this;
    }


}

