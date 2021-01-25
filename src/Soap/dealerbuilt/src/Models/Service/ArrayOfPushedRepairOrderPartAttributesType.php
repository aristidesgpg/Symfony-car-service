<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedRepairOrderPartAttributesType.
 *
 * XSD Type: ArrayOfPushedRepairOrderPartAttributes
 */
class ArrayOfPushedRepairOrderPartAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType[]
     */
    private $pushedRepairOrderPartAttributes = [
    ];

    /**
     * Adds as pushedRepairOrderPartAttributes.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType $pushedRepairOrderPartAttributes
     */
    public function addToPushedRepairOrderPartAttributes(PushedRepairOrderPartAttributesType $pushedRepairOrderPartAttributes)
    {
        $this->pushedRepairOrderPartAttributes[] = $pushedRepairOrderPartAttributes;

        return $this;
    }

    /**
     * isset pushedRepairOrderPartAttributes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushedRepairOrderPartAttributes($index)
    {
        return isset($this->pushedRepairOrderPartAttributes[$index]);
    }

    /**
     * unset pushedRepairOrderPartAttributes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushedRepairOrderPartAttributes($index)
    {
        unset($this->pushedRepairOrderPartAttributes[$index]);
    }

    /**
     * Gets as pushedRepairOrderPartAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType[]
     */
    public function getPushedRepairOrderPartAttributes()
    {
        return $this->pushedRepairOrderPartAttributes;
    }

    /**
     * Sets a new pushedRepairOrderPartAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType[] $pushedRepairOrderPartAttributes
     *
     * @return self
     */
    public function setPushedRepairOrderPartAttributes(array $pushedRepairOrderPartAttributes)
    {
        $this->pushedRepairOrderPartAttributes = $pushedRepairOrderPartAttributes;

        return $this;
    }
}
