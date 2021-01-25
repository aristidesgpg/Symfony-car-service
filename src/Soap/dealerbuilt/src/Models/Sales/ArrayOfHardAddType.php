<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfHardAddType.
 *
 * XSD Type: ArrayOfHardAdd
 */
class ArrayOfHardAddType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\HardAddType[]
     */
    private $hardAdd = [
    ];

    /**
     * Adds as hardAdd.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\HardAddType $hardAdd
     */
    public function addToHardAdd(HardAddType $hardAdd)
    {
        $this->hardAdd[] = $hardAdd;

        return $this;
    }

    /**
     * isset hardAdd.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetHardAdd($index)
    {
        return isset($this->hardAdd[$index]);
    }

    /**
     * unset hardAdd.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetHardAdd($index)
    {
        unset($this->hardAdd[$index]);
    }

    /**
     * Gets as hardAdd.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\HardAddType[]
     */
    public function getHardAdd()
    {
        return $this->hardAdd;
    }

    /**
     * Sets a new hardAdd.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\HardAddType[] $hardAdd
     *
     * @return self
     */
    public function setHardAdd(array $hardAdd)
    {
        $this->hardAdd = $hardAdd;

        return $this;
    }
}
