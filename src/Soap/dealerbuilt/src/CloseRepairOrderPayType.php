<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing CloseRepairOrderPayType.
 */
class CloseRepairOrderPayType
{
    /**
     * @var string
     */
    private $repairOrderKey = null;

    /**
     * @var string
     */
    private $payType = null;

    /**
     * Gets as repairOrderKey.
     *
     * @return string
     */
    public function getRepairOrderKey()
    {
        return $this->repairOrderKey;
    }

    /**
     * Sets a new repairOrderKey.
     *
     * @param string $repairOrderKey
     *
     * @return self
     */
    public function setRepairOrderKey($repairOrderKey)
    {
        $this->repairOrderKey = $repairOrderKey;

        return $this;
    }

    /**
     * Gets as payType.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType.
     *
     * @param string $payType
     *
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;

        return $this;
    }
}
