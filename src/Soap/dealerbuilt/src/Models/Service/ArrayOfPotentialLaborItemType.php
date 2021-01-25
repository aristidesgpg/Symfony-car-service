<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPotentialLaborItemType.
 *
 * XSD Type: ArrayOfPotentialLaborItem
 */
class ArrayOfPotentialLaborItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType[]
     */
    private $potentialLaborItem = [
    ];

    /**
     * Adds as potentialLaborItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType $potentialLaborItem
     */
    public function addToPotentialLaborItem(PotentialLaborItemType $potentialLaborItem)
    {
        $this->potentialLaborItem[] = $potentialLaborItem;

        return $this;
    }

    /**
     * isset potentialLaborItem.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPotentialLaborItem($index)
    {
        return isset($this->potentialLaborItem[$index]);
    }

    /**
     * unset potentialLaborItem.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPotentialLaborItem($index)
    {
        unset($this->potentialLaborItem[$index]);
    }

    /**
     * Gets as potentialLaborItem.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType[]
     */
    public function getPotentialLaborItem()
    {
        return $this->potentialLaborItem;
    }

    /**
     * Sets a new potentialLaborItem.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType[] $potentialLaborItem
     *
     * @return self
     */
    public function setPotentialLaborItem(array $potentialLaborItem)
    {
        $this->potentialLaborItem = $potentialLaborItem;

        return $this;
    }
}
