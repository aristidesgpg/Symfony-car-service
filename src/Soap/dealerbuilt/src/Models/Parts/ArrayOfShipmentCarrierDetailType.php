<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ArrayOfShipmentCarrierDetailType
 *
 * 
 * XSD Type: ArrayOfShipmentCarrierDetail
 */
class ArrayOfShipmentCarrierDetailType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType[] $shipmentCarrierDetail
     */
    private $shipmentCarrierDetail = [
        
    ];

    /**
     * Adds as shipmentCarrierDetail
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType $shipmentCarrierDetail
     */
    public function addToShipmentCarrierDetail(\App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType $shipmentCarrierDetail)
    {
        $this->shipmentCarrierDetail[] = $shipmentCarrierDetail;
        return $this;
    }

    /**
     * isset shipmentCarrierDetail
     *
     * @param int|string $index
     * @return bool
     */
    public function issetShipmentCarrierDetail($index)
    {
        return isset($this->shipmentCarrierDetail[$index]);
    }

    /**
     * unset shipmentCarrierDetail
     *
     * @param int|string $index
     * @return void
     */
    public function unsetShipmentCarrierDetail($index)
    {
        unset($this->shipmentCarrierDetail[$index]);
    }

    /**
     * Gets as shipmentCarrierDetail
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType[]
     */
    public function getShipmentCarrierDetail()
    {
        return $this->shipmentCarrierDetail;
    }

    /**
     * Sets a new shipmentCarrierDetail
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType[] $shipmentCarrierDetail
     * @return self
     */
    public function setShipmentCarrierDetail(array $shipmentCarrierDetail)
    {
        $this->shipmentCarrierDetail = $shipmentCarrierDetail;
        return $this;
    }


}

