<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfRebateType.
 *
 * XSD Type: ArrayOfRebate
 */
class ArrayOfRebateType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\RebateType[]
     */
    private $rebate = [
    ];

    /**
     * Adds as rebate.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\RebateType $rebate
     */
    public function addToRebate(RebateType $rebate)
    {
        $this->rebate[] = $rebate;

        return $this;
    }

    /**
     * isset rebate.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRebate($index)
    {
        return isset($this->rebate[$index]);
    }

    /**
     * unset rebate.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRebate($index)
    {
        unset($this->rebate[$index]);
    }

    /**
     * Gets as rebate.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\RebateType[]
     */
    public function getRebate()
    {
        return $this->rebate;
    }

    /**
     * Sets a new rebate.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\RebateType[] $rebate
     *
     * @return self
     */
    public function setRebate(array $rebate)
    {
        $this->rebate = $rebate;

        return $this;
    }
}
