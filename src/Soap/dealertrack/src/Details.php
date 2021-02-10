<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing Details
 */
class Details
{

    /**
     * @var \App\Soap\dealertrack\src\OpenRepairOrderDetail[] $openRepairOrderDetail
     */
    private $openRepairOrderDetail = [
        
    ];

    /**
     * Adds as openRepairOrderDetail
     *
     * @return self
     * @param \App\Soap\dealertrack\src\OpenRepairOrderDetail $openRepairOrderDetail
     */
    public function addToOpenRepairOrderDetail(\App\Soap\dealertrack\src\OpenRepairOrderDetail $openRepairOrderDetail)
    {
        $this->openRepairOrderDetail[] = $openRepairOrderDetail;
        return $this;
    }

    /**
     * isset openRepairOrderDetail
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOpenRepairOrderDetail($index)
    {
        return isset($this->openRepairOrderDetail[$index]);
    }

    /**
     * unset openRepairOrderDetail
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOpenRepairOrderDetail($index)
    {
        unset($this->openRepairOrderDetail[$index]);
    }

    /**
     * Gets as openRepairOrderDetail
     *
     * @return \App\Soap\dealertrack\src\OpenRepairOrderDetail[]
     */
    public function getOpenRepairOrderDetail()
    {
        return $this->openRepairOrderDetail;
    }

    /**
     * Sets a new openRepairOrderDetail
     *
     * @param \App\Soap\dealertrack\src\OpenRepairOrderDetail[] $openRepairOrderDetail
     * @return self
     */
    public function setOpenRepairOrderDetail(array $openRepairOrderDetail)
    {
        $this->openRepairOrderDetail = $openRepairOrderDetail;
        return $this;
    }


}

