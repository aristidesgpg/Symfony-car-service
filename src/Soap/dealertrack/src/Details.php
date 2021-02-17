<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing Details
 */
class Details
{

    /**
     * @var \App\Soap\dealertrack\src\ClosedRepairOrderDetail[] $closedRepairOrderDetail
     */
    private $closedRepairOrderDetail = [
        
    ];

    /**
     * Adds as closedRepairOrderDetail
     *
     * @return self
     * @param \App\Soap\dealertrack\src\ClosedRepairOrderDetail $closedRepairOrderDetail
     */
    public function addToClosedRepairOrderDetail(\App\Soap\dealertrack\src\ClosedRepairOrderDetail $closedRepairOrderDetail)
    {
        $this->closedRepairOrderDetail[] = $closedRepairOrderDetail;
        return $this;
    }

    /**
     * isset closedRepairOrderDetail
     *
     * @param int|string $index
     * @return bool
     */
    public function issetClosedRepairOrderDetail($index)
    {
        return isset($this->closedRepairOrderDetail[$index]);
    }

    /**
     * unset closedRepairOrderDetail
     *
     * @param int|string $index
     * @return void
     */
    public function unsetClosedRepairOrderDetail($index)
    {
        unset($this->closedRepairOrderDetail[$index]);
    }

    /**
     * Gets as closedRepairOrderDetail
     *
     * @return \App\Soap\dealertrack\src\ClosedRepairOrderDetail[]
     */
    public function getClosedRepairOrderDetail()
    {
        return $this->closedRepairOrderDetail;
    }

    /**
     * Sets a new closedRepairOrderDetail
     *
     * @param \App\Soap\dealertrack\src\ClosedRepairOrderDetail[] $closedRepairOrderDetail
     * @return self
     */
    public function setClosedRepairOrderDetail(array $closedRepairOrderDetail)
    {
        $this->closedRepairOrderDetail = $closedRepairOrderDetail;
        return $this;
    }


}

