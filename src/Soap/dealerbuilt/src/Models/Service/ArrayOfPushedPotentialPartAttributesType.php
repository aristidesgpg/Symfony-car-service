<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPushedPotentialPartAttributesType.
 *
 * XSD Type: ArrayOfPushedPotentialPartAttributes
 */
class ArrayOfPushedPotentialPartAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType[]
     */
    private $pushedPotentialPartAttributes = [
    ];

    /**
     * Adds as pushedPotentialPartAttributes.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType $pushedPotentialPartAttributes
     */
    public function addToPushedPotentialPartAttributes(PushedPotentialPartAttributesType $pushedPotentialPartAttributes)
    {
        $this->pushedPotentialPartAttributes[] = $pushedPotentialPartAttributes;

        return $this;
    }

    /**
     * isset pushedPotentialPartAttributes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushedPotentialPartAttributes($index)
    {
        return isset($this->pushedPotentialPartAttributes[$index]);
    }

    /**
     * unset pushedPotentialPartAttributes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushedPotentialPartAttributes($index)
    {
        unset($this->pushedPotentialPartAttributes[$index]);
    }

    /**
     * Gets as pushedPotentialPartAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType[]
     */
    public function getPushedPotentialPartAttributes()
    {
        return $this->pushedPotentialPartAttributes;
    }

    /**
     * Sets a new pushedPotentialPartAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType[] $pushedPotentialPartAttributes
     *
     * @return self
     */
    public function setPushedPotentialPartAttributes(array $pushedPotentialPartAttributes)
    {
        $this->pushedPotentialPartAttributes = $pushedPotentialPartAttributes;

        return $this;
    }
}
