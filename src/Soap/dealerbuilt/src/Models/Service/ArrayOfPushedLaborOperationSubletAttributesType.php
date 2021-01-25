<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedLaborOperationSubletAttributesType
 *
 * 
 * XSD Type: ArrayOfPushedLaborOperationSubletAttributes
 */
class ArrayOfPushedLaborOperationSubletAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType[] $pushedLaborOperationSubletAttributes
     */
    private $pushedLaborOperationSubletAttributes = [
        
    ];

    /**
     * Adds as pushedLaborOperationSubletAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType $pushedLaborOperationSubletAttributes
     */
    public function addToPushedLaborOperationSubletAttributes(\App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType $pushedLaborOperationSubletAttributes)
    {
        $this->pushedLaborOperationSubletAttributes[] = $pushedLaborOperationSubletAttributes;
        return $this;
    }

    /**
     * isset pushedLaborOperationSubletAttributes
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushedLaborOperationSubletAttributes($index)
    {
        return isset($this->pushedLaborOperationSubletAttributes[$index]);
    }

    /**
     * unset pushedLaborOperationSubletAttributes
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushedLaborOperationSubletAttributes($index)
    {
        unset($this->pushedLaborOperationSubletAttributes[$index]);
    }

    /**
     * Gets as pushedLaborOperationSubletAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType[]
     */
    public function getPushedLaborOperationSubletAttributes()
    {
        return $this->pushedLaborOperationSubletAttributes;
    }

    /**
     * Sets a new pushedLaborOperationSubletAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType[] $pushedLaborOperationSubletAttributes
     * @return self
     */
    public function setPushedLaborOperationSubletAttributes(array $pushedLaborOperationSubletAttributes)
    {
        $this->pushedLaborOperationSubletAttributes = $pushedLaborOperationSubletAttributes;
        return $this;
    }


}

