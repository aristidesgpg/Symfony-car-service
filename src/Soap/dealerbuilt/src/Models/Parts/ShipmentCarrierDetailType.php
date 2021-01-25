<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ShipmentCarrierDetailType.
 *
 * XSD Type: ShipmentCarrierDetail
 */
class ShipmentCarrierDetailType
{
    /**
     * @var string
     */
    private $originatingWarehouse = null;

    /**
     * @var string
     */
    private $shipmentCarrierCompanyCodeDescription = null;

    /**
     * @var string
     */
    private $shipmentCarrierPurposeComment = null;

    /**
     * Gets as originatingWarehouse.
     *
     * @return string
     */
    public function getOriginatingWarehouse()
    {
        return $this->originatingWarehouse;
    }

    /**
     * Sets a new originatingWarehouse.
     *
     * @param string $originatingWarehouse
     *
     * @return self
     */
    public function setOriginatingWarehouse($originatingWarehouse)
    {
        $this->originatingWarehouse = $originatingWarehouse;

        return $this;
    }

    /**
     * Gets as shipmentCarrierCompanyCodeDescription.
     *
     * @return string
     */
    public function getShipmentCarrierCompanyCodeDescription()
    {
        return $this->shipmentCarrierCompanyCodeDescription;
    }

    /**
     * Sets a new shipmentCarrierCompanyCodeDescription.
     *
     * @param string $shipmentCarrierCompanyCodeDescription
     *
     * @return self
     */
    public function setShipmentCarrierCompanyCodeDescription($shipmentCarrierCompanyCodeDescription)
    {
        $this->shipmentCarrierCompanyCodeDescription = $shipmentCarrierCompanyCodeDescription;

        return $this;
    }

    /**
     * Gets as shipmentCarrierPurposeComment.
     *
     * @return string
     */
    public function getShipmentCarrierPurposeComment()
    {
        return $this->shipmentCarrierPurposeComment;
    }

    /**
     * Sets a new shipmentCarrierPurposeComment.
     *
     * @param string $shipmentCarrierPurposeComment
     *
     * @return self
     */
    public function setShipmentCarrierPurposeComment($shipmentCarrierPurposeComment)
    {
        $this->shipmentCarrierPurposeComment = $shipmentCarrierPurposeComment;

        return $this;
    }
}
