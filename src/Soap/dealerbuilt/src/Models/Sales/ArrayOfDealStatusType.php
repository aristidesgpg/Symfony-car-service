<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfDealStatusType.
 *
 * XSD Type: ArrayOfDealStatus
 */
class ArrayOfDealStatusType
{
    /**
     * @var string[]
     */
    private $dealStatus = [
    ];

    /**
     * Adds as dealStatus.
     *
     * @return self
     *
     * @param string $dealStatus
     */
    public function addToDealStatus($dealStatus)
    {
        $this->dealStatus[] = $dealStatus;

        return $this;
    }

    /**
     * isset dealStatus.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDealStatus($index)
    {
        return isset($this->dealStatus[$index]);
    }

    /**
     * unset dealStatus.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDealStatus($index)
    {
        unset($this->dealStatus[$index]);
    }

    /**
     * Gets as dealStatus.
     *
     * @return string[]
     */
    public function getDealStatus()
    {
        return $this->dealStatus;
    }

    /**
     * Sets a new dealStatus.
     *
     * @param string $dealStatus
     *
     * @return self
     */
    public function setDealStatus(array $dealStatus)
    {
        $this->dealStatus = $dealStatus;

        return $this;
    }
}
