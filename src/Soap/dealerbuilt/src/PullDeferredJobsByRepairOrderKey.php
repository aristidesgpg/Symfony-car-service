<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDeferredJobsByRepairOrderKey.
 */
class PullDeferredJobsByRepairOrderKey
{
    /**
     * @var string
     */
    private $repairOrderKey = null;

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
}
