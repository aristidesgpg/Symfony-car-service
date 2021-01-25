<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfSoftAddType.
 *
 * XSD Type: ArrayOfSoftAdd
 */
class ArrayOfSoftAddType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType[]
     */
    private $softAdd = [
    ];

    /**
     * Adds as softAdd.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType $softAdd
     */
    public function addToSoftAdd(SoftAddType $softAdd)
    {
        $this->softAdd[] = $softAdd;

        return $this;
    }

    /**
     * isset softAdd.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSoftAdd($index)
    {
        return isset($this->softAdd[$index]);
    }

    /**
     * unset softAdd.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSoftAdd($index)
    {
        unset($this->softAdd[$index]);
    }

    /**
     * Gets as softAdd.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType[]
     */
    public function getSoftAdd()
    {
        return $this->softAdd;
    }

    /**
     * Sets a new softAdd.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\SoftAddType[] $softAdd
     *
     * @return self
     */
    public function setSoftAdd(array $softAdd)
    {
        $this->softAdd = $softAdd;

        return $this;
    }
}
