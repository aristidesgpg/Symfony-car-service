<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPotentialServiceComponentType.
 *
 * XSD Type: ArrayOfPotentialServiceComponent
 */
class ArrayOfPotentialServiceComponentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType[]
     */
    private $potentialServiceComponent = [
    ];

    /**
     * Adds as potentialServiceComponent.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType $potentialServiceComponent
     */
    public function addToPotentialServiceComponent(PotentialServiceComponentType $potentialServiceComponent)
    {
        $this->potentialServiceComponent[] = $potentialServiceComponent;

        return $this;
    }

    /**
     * isset potentialServiceComponent.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPotentialServiceComponent($index)
    {
        return isset($this->potentialServiceComponent[$index]);
    }

    /**
     * unset potentialServiceComponent.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPotentialServiceComponent($index)
    {
        unset($this->potentialServiceComponent[$index]);
    }

    /**
     * Gets as potentialServiceComponent.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType[]
     */
    public function getPotentialServiceComponent()
    {
        return $this->potentialServiceComponent;
    }

    /**
     * Sets a new potentialServiceComponent.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType[] $potentialServiceComponent
     *
     * @return self
     */
    public function setPotentialServiceComponent(array $potentialServiceComponent)
    {
        $this->potentialServiceComponent = $potentialServiceComponent;

        return $this;
    }
}
