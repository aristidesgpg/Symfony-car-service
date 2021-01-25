<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedRepairOrderTechsAttributesType
 *
 * 
 * XSD Type: ArrayOfPushedRepairOrderTechsAttributes
 */
class ArrayOfPushedRepairOrderTechsAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType[] $pushedRepairOrderTechsAttributes
     */
    private $pushedRepairOrderTechsAttributes = [
        
    ];

    /**
     * Adds as pushedRepairOrderTechsAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType $pushedRepairOrderTechsAttributes
     */
    public function addToPushedRepairOrderTechsAttributes(\App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType $pushedRepairOrderTechsAttributes)
    {
        $this->pushedRepairOrderTechsAttributes[] = $pushedRepairOrderTechsAttributes;
        return $this;
    }

    /**
     * isset pushedRepairOrderTechsAttributes
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushedRepairOrderTechsAttributes($index)
    {
        return isset($this->pushedRepairOrderTechsAttributes[$index]);
    }

    /**
     * unset pushedRepairOrderTechsAttributes
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushedRepairOrderTechsAttributes($index)
    {
        unset($this->pushedRepairOrderTechsAttributes[$index]);
    }

    /**
     * Gets as pushedRepairOrderTechsAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType[]
     */
    public function getPushedRepairOrderTechsAttributes()
    {
        return $this->pushedRepairOrderTechsAttributes;
    }

    /**
     * Sets a new pushedRepairOrderTechsAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType[] $pushedRepairOrderTechsAttributes
     * @return self
     */
    public function setPushedRepairOrderTechsAttributes(array $pushedRepairOrderTechsAttributes)
    {
        $this->pushedRepairOrderTechsAttributes = $pushedRepairOrderTechsAttributes;
        return $this;
    }


}

