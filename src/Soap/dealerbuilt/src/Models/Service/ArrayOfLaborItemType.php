<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfLaborItemType.
 *
 * XSD Type: ArrayOfLaborItem
 */
class ArrayOfLaborItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\LaborItemType[]
     */
    private $laborItem = [
    ];

    /**
     * Adds as laborItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborItemType $laborItem
     */
    public function addToLaborItem(LaborItemType $laborItem)
    {
        $this->laborItem[] = $laborItem;

        return $this;
    }

    /**
     * isset laborItem.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLaborItem($index)
    {
        return isset($this->laborItem[$index]);
    }

    /**
     * unset laborItem.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLaborItem($index)
    {
        unset($this->laborItem[$index]);
    }

    /**
     * Gets as laborItem.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\LaborItemType[]
     */
    public function getLaborItem()
    {
        return $this->laborItem;
    }

    /**
     * Sets a new laborItem.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborItemType[] $laborItem
     *
     * @return self
     */
    public function setLaborItem(array $laborItem)
    {
        $this->laborItem = $laborItem;

        return $this;
    }
}
