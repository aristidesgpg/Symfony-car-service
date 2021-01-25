<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing PartsOrderLinePushRequestType.
 *
 * XSD Type: PartsOrderLinePushRequest
 */
class PartsOrderLinePushRequestType
{
    /**
     * @var string
     */
    private $bin = null;

    /**
     * @var int
     */
    private $counterTicketId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $dealerPrice = null;

    /**
     * @var string
     */
    private $externalManufacturerPartsOrderId = null;

    /**
     * @var string
     */
    private $externalPartsOrderId = null;

    /**
     * @var string
     */
    private $externalPartsOrderLineId = null;

    /**
     * @var string
     */
    private $kitPartNumber = null;

    /**
     * @var int
     */
    private $lineSequence = null;

    /**
     * @var string
     */
    private $partDescription = null;

    /**
     * @var string
     */
    private $partNumber = null;

    /**
     * @var float
     */
    private $quantityBackordered = null;

    /**
     * @var float
     */
    private $quantityOrdered = null;

    /**
     * @var float
     */
    private $quantityShipped = null;

    /**
     * @var int
     */
    private $repairOrderId = null;

    /**
     * @var int
     */
    private $repairOrderJobNumber = null;

    /**
     * @var string
     */
    private $shippedPartNumber = null;

    /**
     * @var string
     */
    private $shipperNumber = null;

    /**
     * @var string
     */
    private $source = null;

    /**
     * @var string
     */
    private $vendor = null;

    /**
     * Gets as bin.
     *
     * @return string
     */
    public function getBin()
    {
        return $this->bin;
    }

    /**
     * Sets a new bin.
     *
     * @param string $bin
     *
     * @return self
     */
    public function setBin($bin)
    {
        $this->bin = $bin;

        return $this;
    }

    /**
     * Gets as counterTicketId.
     *
     * @return int
     */
    public function getCounterTicketId()
    {
        return $this->counterTicketId;
    }

    /**
     * Sets a new counterTicketId.
     *
     * @param int $counterTicketId
     *
     * @return self
     */
    public function setCounterTicketId($counterTicketId)
    {
        $this->counterTicketId = $counterTicketId;

        return $this;
    }

    /**
     * Gets as dealerPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerPrice()
    {
        return $this->dealerPrice;
    }

    /**
     * Sets a new dealerPrice.
     *
     * @return self
     */
    public function setDealerPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerPrice)
    {
        $this->dealerPrice = $dealerPrice;

        return $this;
    }

    /**
     * Gets as externalManufacturerPartsOrderId.
     *
     * @return string
     */
    public function getExternalManufacturerPartsOrderId()
    {
        return $this->externalManufacturerPartsOrderId;
    }

    /**
     * Sets a new externalManufacturerPartsOrderId.
     *
     * @param string $externalManufacturerPartsOrderId
     *
     * @return self
     */
    public function setExternalManufacturerPartsOrderId($externalManufacturerPartsOrderId)
    {
        $this->externalManufacturerPartsOrderId = $externalManufacturerPartsOrderId;

        return $this;
    }

    /**
     * Gets as externalPartsOrderId.
     *
     * @return string
     */
    public function getExternalPartsOrderId()
    {
        return $this->externalPartsOrderId;
    }

    /**
     * Sets a new externalPartsOrderId.
     *
     * @param string $externalPartsOrderId
     *
     * @return self
     */
    public function setExternalPartsOrderId($externalPartsOrderId)
    {
        $this->externalPartsOrderId = $externalPartsOrderId;

        return $this;
    }

    /**
     * Gets as externalPartsOrderLineId.
     *
     * @return string
     */
    public function getExternalPartsOrderLineId()
    {
        return $this->externalPartsOrderLineId;
    }

    /**
     * Sets a new externalPartsOrderLineId.
     *
     * @param string $externalPartsOrderLineId
     *
     * @return self
     */
    public function setExternalPartsOrderLineId($externalPartsOrderLineId)
    {
        $this->externalPartsOrderLineId = $externalPartsOrderLineId;

        return $this;
    }

    /**
     * Gets as kitPartNumber.
     *
     * @return string
     */
    public function getKitPartNumber()
    {
        return $this->kitPartNumber;
    }

    /**
     * Sets a new kitPartNumber.
     *
     * @param string $kitPartNumber
     *
     * @return self
     */
    public function setKitPartNumber($kitPartNumber)
    {
        $this->kitPartNumber = $kitPartNumber;

        return $this;
    }

    /**
     * Gets as lineSequence.
     *
     * @return int
     */
    public function getLineSequence()
    {
        return $this->lineSequence;
    }

    /**
     * Sets a new lineSequence.
     *
     * @param int $lineSequence
     *
     * @return self
     */
    public function setLineSequence($lineSequence)
    {
        $this->lineSequence = $lineSequence;

        return $this;
    }

    /**
     * Gets as partDescription.
     *
     * @return string
     */
    public function getPartDescription()
    {
        return $this->partDescription;
    }

    /**
     * Sets a new partDescription.
     *
     * @param string $partDescription
     *
     * @return self
     */
    public function setPartDescription($partDescription)
    {
        $this->partDescription = $partDescription;

        return $this;
    }

    /**
     * Gets as partNumber.
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber.
     *
     * @param string $partNumber
     *
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    /**
     * Gets as quantityBackordered.
     *
     * @return float
     */
    public function getQuantityBackordered()
    {
        return $this->quantityBackordered;
    }

    /**
     * Sets a new quantityBackordered.
     *
     * @param float $quantityBackordered
     *
     * @return self
     */
    public function setQuantityBackordered($quantityBackordered)
    {
        $this->quantityBackordered = $quantityBackordered;

        return $this;
    }

    /**
     * Gets as quantityOrdered.
     *
     * @return float
     */
    public function getQuantityOrdered()
    {
        return $this->quantityOrdered;
    }

    /**
     * Sets a new quantityOrdered.
     *
     * @param float $quantityOrdered
     *
     * @return self
     */
    public function setQuantityOrdered($quantityOrdered)
    {
        $this->quantityOrdered = $quantityOrdered;

        return $this;
    }

    /**
     * Gets as quantityShipped.
     *
     * @return float
     */
    public function getQuantityShipped()
    {
        return $this->quantityShipped;
    }

    /**
     * Sets a new quantityShipped.
     *
     * @param float $quantityShipped
     *
     * @return self
     */
    public function setQuantityShipped($quantityShipped)
    {
        $this->quantityShipped = $quantityShipped;

        return $this;
    }

    /**
     * Gets as repairOrderId.
     *
     * @return int
     */
    public function getRepairOrderId()
    {
        return $this->repairOrderId;
    }

    /**
     * Sets a new repairOrderId.
     *
     * @param int $repairOrderId
     *
     * @return self
     */
    public function setRepairOrderId($repairOrderId)
    {
        $this->repairOrderId = $repairOrderId;

        return $this;
    }

    /**
     * Gets as repairOrderJobNumber.
     *
     * @return int
     */
    public function getRepairOrderJobNumber()
    {
        return $this->repairOrderJobNumber;
    }

    /**
     * Sets a new repairOrderJobNumber.
     *
     * @param int $repairOrderJobNumber
     *
     * @return self
     */
    public function setRepairOrderJobNumber($repairOrderJobNumber)
    {
        $this->repairOrderJobNumber = $repairOrderJobNumber;

        return $this;
    }

    /**
     * Gets as shippedPartNumber.
     *
     * @return string
     */
    public function getShippedPartNumber()
    {
        return $this->shippedPartNumber;
    }

    /**
     * Sets a new shippedPartNumber.
     *
     * @param string $shippedPartNumber
     *
     * @return self
     */
    public function setShippedPartNumber($shippedPartNumber)
    {
        $this->shippedPartNumber = $shippedPartNumber;

        return $this;
    }

    /**
     * Gets as shipperNumber.
     *
     * @return string
     */
    public function getShipperNumber()
    {
        return $this->shipperNumber;
    }

    /**
     * Sets a new shipperNumber.
     *
     * @param string $shipperNumber
     *
     * @return self
     */
    public function setShipperNumber($shipperNumber)
    {
        $this->shipperNumber = $shipperNumber;

        return $this;
    }

    /**
     * Gets as source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets a new source.
     *
     * @param string $source
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Gets as vendor.
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets a new vendor.
     *
     * @param string $vendor
     *
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }
}
