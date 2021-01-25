<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedPotentialLaborOperationSubletAttributesType.
 *
 * XSD Type: ArrayOfPushedPotentialLaborOperationSubletAttributes
 */
class ArrayOfPushedPotentialLaborOperationSubletAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType[]
     */
    private $pushedPotentialLaborOperationSubletAttributes = [
    ];

    /**
     * Adds as pushedPotentialLaborOperationSubletAttributes.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType $pushedPotentialLaborOperationSubletAttributes
     */
    public function addToPushedPotentialLaborOperationSubletAttributes(PushedPotentialLaborOperationSubletAttributesType $pushedPotentialLaborOperationSubletAttributes)
    {
        $this->pushedPotentialLaborOperationSubletAttributes[] = $pushedPotentialLaborOperationSubletAttributes;

        return $this;
    }

    /**
     * isset pushedPotentialLaborOperationSubletAttributes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushedPotentialLaborOperationSubletAttributes($index)
    {
        return isset($this->pushedPotentialLaborOperationSubletAttributes[$index]);
    }

    /**
     * unset pushedPotentialLaborOperationSubletAttributes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushedPotentialLaborOperationSubletAttributes($index)
    {
        unset($this->pushedPotentialLaborOperationSubletAttributes[$index]);
    }

    /**
     * Gets as pushedPotentialLaborOperationSubletAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType[]
     */
    public function getPushedPotentialLaborOperationSubletAttributes()
    {
        return $this->pushedPotentialLaborOperationSubletAttributes;
    }

    /**
     * Sets a new pushedPotentialLaborOperationSubletAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType[] $pushedPotentialLaborOperationSubletAttributes
     *
     * @return self
     */
    public function setPushedPotentialLaborOperationSubletAttributes(array $pushedPotentialLaborOperationSubletAttributes)
    {
        $this->pushedPotentialLaborOperationSubletAttributes = $pushedPotentialLaborOperationSubletAttributes;

        return $this;
    }
}
