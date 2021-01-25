<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedRepairOrderJobAttributesType.
 *
 * XSD Type: ArrayOfPushedRepairOrderJobAttributes
 */
class ArrayOfPushedRepairOrderJobAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType[]
     */
    private $pushedRepairOrderJobAttributes = [
    ];

    /**
     * Adds as pushedRepairOrderJobAttributes.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType $pushedRepairOrderJobAttributes
     */
    public function addToPushedRepairOrderJobAttributes(PushedRepairOrderJobAttributesType $pushedRepairOrderJobAttributes)
    {
        $this->pushedRepairOrderJobAttributes[] = $pushedRepairOrderJobAttributes;

        return $this;
    }

    /**
     * isset pushedRepairOrderJobAttributes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushedRepairOrderJobAttributes($index)
    {
        return isset($this->pushedRepairOrderJobAttributes[$index]);
    }

    /**
     * unset pushedRepairOrderJobAttributes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushedRepairOrderJobAttributes($index)
    {
        unset($this->pushedRepairOrderJobAttributes[$index]);
    }

    /**
     * Gets as pushedRepairOrderJobAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType[]
     */
    public function getPushedRepairOrderJobAttributes()
    {
        return $this->pushedRepairOrderJobAttributes;
    }

    /**
     * Sets a new pushedRepairOrderJobAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType[] $pushedRepairOrderJobAttributes
     *
     * @return self
     */
    public function setPushedRepairOrderJobAttributes(array $pushedRepairOrderJobAttributes)
    {
        $this->pushedRepairOrderJobAttributes = $pushedRepairOrderJobAttributes;

        return $this;
    }
}
