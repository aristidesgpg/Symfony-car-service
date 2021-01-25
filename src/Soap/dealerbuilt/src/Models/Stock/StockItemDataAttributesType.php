<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing StockItemDataAttributesType
 *
 * 
 * XSD Type: StockItemDataAttributes
 */
class StockItemDataAttributesType
{

    /**
     * @var \DateTime $estimatedArrivalDate
     */
    private $estimatedArrivalDate = null;

    /**
     * @var string $orderDetail
     */
    private $orderDetail = null;

    /**
     * @var string $orderNumber
     */
    private $orderNumber = null;

    /**
     * Gets as estimatedArrivalDate
     *
     * @return \DateTime
     */
    public function getEstimatedArrivalDate()
    {
        return $this->estimatedArrivalDate;
    }

    /**
     * Sets a new estimatedArrivalDate
     *
     * @param \DateTime $estimatedArrivalDate
     * @return self
     */
    public function setEstimatedArrivalDate(\DateTime $estimatedArrivalDate)
    {
        $this->estimatedArrivalDate = $estimatedArrivalDate;
        return $this;
    }

    /**
     * Gets as orderDetail
     *
     * @return string
     */
    public function getOrderDetail()
    {
        return $this->orderDetail;
    }

    /**
     * Sets a new orderDetail
     *
     * @param string $orderDetail
     * @return self
     */
    public function setOrderDetail($orderDetail)
    {
        $this->orderDetail = $orderDetail;
        return $this;
    }

    /**
     * Gets as orderNumber
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Sets a new orderNumber
     *
     * @param string $orderNumber
     * @return self
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }


}

