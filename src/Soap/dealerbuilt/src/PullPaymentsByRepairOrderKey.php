<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPaymentsByRepairOrderKey
 */
class PullPaymentsByRepairOrderKey
{

    /**
     * @var string[] $repairOrderKeys
     */
    private $repairOrderKeys = null;

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToRepairOrderKeys($string)
    {
        $this->repairOrderKeys[] = $string;
        return $this;
    }

    /**
     * isset repairOrderKeys
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRepairOrderKeys($index)
    {
        return isset($this->repairOrderKeys[$index]);
    }

    /**
     * unset repairOrderKeys
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRepairOrderKeys($index)
    {
        unset($this->repairOrderKeys[$index]);
    }

    /**
     * Gets as repairOrderKeys
     *
     * @return string[]
     */
    public function getRepairOrderKeys()
    {
        return $this->repairOrderKeys;
    }

    /**
     * Sets a new repairOrderKeys
     *
     * @param string[] $repairOrderKeys
     * @return self
     */
    public function setRepairOrderKeys(array $repairOrderKeys)
    {
        $this->repairOrderKeys = $repairOrderKeys;
        return $this;
    }


}

