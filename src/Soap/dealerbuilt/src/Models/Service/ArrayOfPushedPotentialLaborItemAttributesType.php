<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedPotentialLaborItemAttributesType.
 *
 * XSD Type: ArrayOfPushedPotentialLaborItemAttributes
 */
class ArrayOfPushedPotentialLaborItemAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType[]
     */
    private $pushedPotentialLaborItemAttributes = [
    ];

    /**
     * Adds as pushedPotentialLaborItemAttributes.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType $pushedPotentialLaborItemAttributes
     */
    public function addToPushedPotentialLaborItemAttributes(PushedPotentialLaborItemAttributesType $pushedPotentialLaborItemAttributes)
    {
        $this->pushedPotentialLaborItemAttributes[] = $pushedPotentialLaborItemAttributes;

        return $this;
    }

    /**
     * isset pushedPotentialLaborItemAttributes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushedPotentialLaborItemAttributes($index)
    {
        return isset($this->pushedPotentialLaborItemAttributes[$index]);
    }

    /**
     * unset pushedPotentialLaborItemAttributes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushedPotentialLaborItemAttributes($index)
    {
        unset($this->pushedPotentialLaborItemAttributes[$index]);
    }

    /**
     * Gets as pushedPotentialLaborItemAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType[]
     */
    public function getPushedPotentialLaborItemAttributes()
    {
        return $this->pushedPotentialLaborItemAttributes;
    }

    /**
     * Sets a new pushedPotentialLaborItemAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType[] $pushedPotentialLaborItemAttributes
     *
     * @return self
     */
    public function setPushedPotentialLaborItemAttributes(array $pushedPotentialLaborItemAttributes)
    {
        $this->pushedPotentialLaborItemAttributes = $pushedPotentialLaborItemAttributes;

        return $this;
    }
}
