<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing PartsOrderLineType.
 *
 * XSD Type: PartsOrderLine
 */
class PartsOrderLineType
{
    /**
     * @var string
     */
    private $binLocation = null;

    /**
     * @var string
     */
    private $comments = null;

    /**
     * @var string
     */
    private $counterTicketNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType
     */
    private $customer = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NameType
     */
    private $customerName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $dealerPrice = null;

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
     * @var \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartType
     */
    private $part = null;

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
    private $quantityReceived = null;

    /**
     * @var \DateTime
     */
    private $receivedStamp = null;

    /**
     * @var string
     */
    private $repairOrderNumber = null;

    /**
     * @var string
     */
    private $roVehicleVin = null;

    /**
     * @var string
     */
    private $vendor = null;

    /**
     * Gets as binLocation.
     *
     * @return string
     */
    public function getBinLocation()
    {
        return $this->binLocation;
    }

    /**
     * Sets a new binLocation.
     *
     * @param string $binLocation
     *
     * @return self
     */
    public function setBinLocation($binLocation)
    {
        $this->binLocation = $binLocation;

        return $this;
    }

    /**
     * Gets as comments.
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments.
     *
     * @param string $comments
     *
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Gets as counterTicketNumber.
     *
     * @return string
     */
    public function getCounterTicketNumber()
    {
        return $this->counterTicketNumber;
    }

    /**
     * Sets a new counterTicketNumber.
     *
     * @param string $counterTicketNumber
     *
     * @return self
     */
    public function setCounterTicketNumber($counterTicketNumber)
    {
        $this->counterTicketNumber = $counterTicketNumber;

        return $this;
    }

    /**
     * Gets as customer.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets a new customer.
     *
     * @return self
     */
    public function setCustomer(\App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Gets as customerName.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NameType
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Sets a new customerName.
     *
     * @return self
     */
    public function setCustomerName(\App\Soap\dealerbuilt\src\Models\NameType $customerName)
    {
        $this->customerName = $customerName;

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
     * Gets as part.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartType
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Sets a new part.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartType $part
     *
     * @return self
     */
    public function setPart(InventoryPartType $part)
    {
        $this->part = $part;

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
     * Gets as quantityReceived.
     *
     * @return float
     */
    public function getQuantityReceived()
    {
        return $this->quantityReceived;
    }

    /**
     * Sets a new quantityReceived.
     *
     * @param float $quantityReceived
     *
     * @return self
     */
    public function setQuantityReceived($quantityReceived)
    {
        $this->quantityReceived = $quantityReceived;

        return $this;
    }

    /**
     * Gets as receivedStamp.
     *
     * @return \DateTime
     */
    public function getReceivedStamp()
    {
        return $this->receivedStamp;
    }

    /**
     * Sets a new receivedStamp.
     *
     * @return self
     */
    public function setReceivedStamp(\DateTime $receivedStamp)
    {
        $this->receivedStamp = $receivedStamp;

        return $this;
    }

    /**
     * Gets as repairOrderNumber.
     *
     * @return string
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber.
     *
     * @param string $repairOrderNumber
     *
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;

        return $this;
    }

    /**
     * Gets as roVehicleVin.
     *
     * @return string
     */
    public function getRoVehicleVin()
    {
        return $this->roVehicleVin;
    }

    /**
     * Sets a new roVehicleVin.
     *
     * @param string $roVehicleVin
     *
     * @return self
     */
    public function setRoVehicleVin($roVehicleVin)
    {
        $this->roVehicleVin = $roVehicleVin;

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
