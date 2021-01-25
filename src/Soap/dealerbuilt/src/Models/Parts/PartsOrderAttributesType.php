<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing PartsOrderAttributesType.
 *
 * XSD Type: PartsOrderAttributes
 */
class PartsOrderAttributesType
{
    /**
     * @var bool
     */
    private $allowCrossShipmentIndicator = null;

    /**
     * @var string
     */
    private $alternateShipPriority = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    private $alternateShipTo = null;

    /**
     * @var string
     */
    private $comments = null;

    /**
     * @var \DateTime
     */
    private $completedStamp = null;

    /**
     * @var string
     */
    private $factoryCode = null;

    /**
     * @var string
     */
    private $factoryOrderReferenceNumber = null;

    /**
     * @var bool
     */
    private $isAlternateShipTo = null;

    /**
     * @var bool
     */
    private $isTransmitted = null;

    /**
     * @var string
     */
    private $lastModifiedBy = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType[]
     */
    private $lines = null;

    /**
     * @var \DateTime
     */
    private $orderStamp = null;

    /**
     * @var string
     */
    private $orderType = null;

    /**
     * @var string
     */
    private $partsOrderNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    private $placedBy = null;

    /**
     * @var string
     */
    private $promotionCode = null;

    /**
     * @var string
     */
    private $shipPriority = null;

    /**
     * @var string
     */
    private $specialInstructions = null;

    /**
     * @var string
     */
    private $vendorCode = null;

    /**
     * @var string
     */
    private $vendorName = null;

    /**
     * Gets as allowCrossShipmentIndicator.
     *
     * @return bool
     */
    public function getAllowCrossShipmentIndicator()
    {
        return $this->allowCrossShipmentIndicator;
    }

    /**
     * Sets a new allowCrossShipmentIndicator.
     *
     * @param bool $allowCrossShipmentIndicator
     *
     * @return self
     */
    public function setAllowCrossShipmentIndicator($allowCrossShipmentIndicator)
    {
        $this->allowCrossShipmentIndicator = $allowCrossShipmentIndicator;

        return $this;
    }

    /**
     * Gets as alternateShipPriority.
     *
     * @return string
     */
    public function getAlternateShipPriority()
    {
        return $this->alternateShipPriority;
    }

    /**
     * Sets a new alternateShipPriority.
     *
     * @param string $alternateShipPriority
     *
     * @return self
     */
    public function setAlternateShipPriority($alternateShipPriority)
    {
        $this->alternateShipPriority = $alternateShipPriority;

        return $this;
    }

    /**
     * Gets as alternateShipTo.
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getAlternateShipTo()
    {
        return $this->alternateShipTo;
    }

    /**
     * Sets a new alternateShipTo.
     *
     * @return self
     */
    public function setAlternateShipTo(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $alternateShipTo)
    {
        $this->alternateShipTo = $alternateShipTo;

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
     * Gets as completedStamp.
     *
     * @return \DateTime
     */
    public function getCompletedStamp()
    {
        return $this->completedStamp;
    }

    /**
     * Sets a new completedStamp.
     *
     * @return self
     */
    public function setCompletedStamp(\DateTime $completedStamp)
    {
        $this->completedStamp = $completedStamp;

        return $this;
    }

    /**
     * Gets as factoryCode.
     *
     * @return string
     */
    public function getFactoryCode()
    {
        return $this->factoryCode;
    }

    /**
     * Sets a new factoryCode.
     *
     * @param string $factoryCode
     *
     * @return self
     */
    public function setFactoryCode($factoryCode)
    {
        $this->factoryCode = $factoryCode;

        return $this;
    }

    /**
     * Gets as factoryOrderReferenceNumber.
     *
     * @return string
     */
    public function getFactoryOrderReferenceNumber()
    {
        return $this->factoryOrderReferenceNumber;
    }

    /**
     * Sets a new factoryOrderReferenceNumber.
     *
     * @param string $factoryOrderReferenceNumber
     *
     * @return self
     */
    public function setFactoryOrderReferenceNumber($factoryOrderReferenceNumber)
    {
        $this->factoryOrderReferenceNumber = $factoryOrderReferenceNumber;

        return $this;
    }

    /**
     * Gets as isAlternateShipTo.
     *
     * @return bool
     */
    public function getIsAlternateShipTo()
    {
        return $this->isAlternateShipTo;
    }

    /**
     * Sets a new isAlternateShipTo.
     *
     * @param bool $isAlternateShipTo
     *
     * @return self
     */
    public function setIsAlternateShipTo($isAlternateShipTo)
    {
        $this->isAlternateShipTo = $isAlternateShipTo;

        return $this;
    }

    /**
     * Gets as isTransmitted.
     *
     * @return bool
     */
    public function getIsTransmitted()
    {
        return $this->isTransmitted;
    }

    /**
     * Sets a new isTransmitted.
     *
     * @param bool $isTransmitted
     *
     * @return self
     */
    public function setIsTransmitted($isTransmitted)
    {
        $this->isTransmitted = $isTransmitted;

        return $this;
    }

    /**
     * Gets as lastModifiedBy.
     *
     * @return string
     */
    public function getLastModifiedBy()
    {
        return $this->lastModifiedBy;
    }

    /**
     * Sets a new lastModifiedBy.
     *
     * @param string $lastModifiedBy
     *
     * @return self
     */
    public function setLastModifiedBy($lastModifiedBy)
    {
        $this->lastModifiedBy = $lastModifiedBy;

        return $this;
    }

    /**
     * Adds as partsOrderLine.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType $partsOrderLine
     */
    public function addToLines(PartsOrderLineType $partsOrderLine)
    {
        $this->lines[] = $partsOrderLine;

        return $this;
    }

    /**
     * isset lines.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLines($index)
    {
        return isset($this->lines[$index]);
    }

    /**
     * unset lines.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLines($index)
    {
        unset($this->lines[$index]);
    }

    /**
     * Gets as lines.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType[]
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * Sets a new lines.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLineType[] $lines
     *
     * @return self
     */
    public function setLines(array $lines)
    {
        $this->lines = $lines;

        return $this;
    }

    /**
     * Gets as orderStamp.
     *
     * @return \DateTime
     */
    public function getOrderStamp()
    {
        return $this->orderStamp;
    }

    /**
     * Sets a new orderStamp.
     *
     * @return self
     */
    public function setOrderStamp(\DateTime $orderStamp)
    {
        $this->orderStamp = $orderStamp;

        return $this;
    }

    /**
     * Gets as orderType.
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Sets a new orderType.
     *
     * @param string $orderType
     *
     * @return self
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * Gets as partsOrderNumber.
     *
     * @return string
     */
    public function getPartsOrderNumber()
    {
        return $this->partsOrderNumber;
    }

    /**
     * Sets a new partsOrderNumber.
     *
     * @param string $partsOrderNumber
     *
     * @return self
     */
    public function setPartsOrderNumber($partsOrderNumber)
    {
        $this->partsOrderNumber = $partsOrderNumber;

        return $this;
    }

    /**
     * Gets as placedBy.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getPlacedBy()
    {
        return $this->placedBy;
    }

    /**
     * Sets a new placedBy.
     *
     * @return self
     */
    public function setPlacedBy(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $placedBy)
    {
        $this->placedBy = $placedBy;

        return $this;
    }

    /**
     * Gets as promotionCode.
     *
     * @return string
     */
    public function getPromotionCode()
    {
        return $this->promotionCode;
    }

    /**
     * Sets a new promotionCode.
     *
     * @param string $promotionCode
     *
     * @return self
     */
    public function setPromotionCode($promotionCode)
    {
        $this->promotionCode = $promotionCode;

        return $this;
    }

    /**
     * Gets as shipPriority.
     *
     * @return string
     */
    public function getShipPriority()
    {
        return $this->shipPriority;
    }

    /**
     * Sets a new shipPriority.
     *
     * @param string $shipPriority
     *
     * @return self
     */
    public function setShipPriority($shipPriority)
    {
        $this->shipPriority = $shipPriority;

        return $this;
    }

    /**
     * Gets as specialInstructions.
     *
     * @return string
     */
    public function getSpecialInstructions()
    {
        return $this->specialInstructions;
    }

    /**
     * Sets a new specialInstructions.
     *
     * @param string $specialInstructions
     *
     * @return self
     */
    public function setSpecialInstructions($specialInstructions)
    {
        $this->specialInstructions = $specialInstructions;

        return $this;
    }

    /**
     * Gets as vendorCode.
     *
     * @return string
     */
    public function getVendorCode()
    {
        return $this->vendorCode;
    }

    /**
     * Sets a new vendorCode.
     *
     * @param string $vendorCode
     *
     * @return self
     */
    public function setVendorCode($vendorCode)
    {
        $this->vendorCode = $vendorCode;

        return $this;
    }

    /**
     * Gets as vendorName.
     *
     * @return string
     */
    public function getVendorName()
    {
        return $this->vendorName;
    }

    /**
     * Sets a new vendorName.
     *
     * @param string $vendorName
     *
     * @return self
     */
    public function setVendorName($vendorName)
    {
        $this->vendorName = $vendorName;

        return $this;
    }
}
