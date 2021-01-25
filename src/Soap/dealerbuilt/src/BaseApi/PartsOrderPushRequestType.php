<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsOrderPushRequestType
 *
 * 
 * XSD Type: PartsOrderPushRequest
 */
class PartsOrderPushRequestType
{

    /**
     * @var string $externalPartsOrderId
     */
    private $externalPartsOrderId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType[] $lines
     */
    private $lines = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType $orderInfo
     */
    private $orderInfo = null;

    /**
     * @var string $partsOrderKey
     */
    private $partsOrderKey = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as externalPartsOrderId
     *
     * @return string
     */
    public function getExternalPartsOrderId()
    {
        return $this->externalPartsOrderId;
    }

    /**
     * Sets a new externalPartsOrderId
     *
     * @param string $externalPartsOrderId
     * @return self
     */
    public function setExternalPartsOrderId($externalPartsOrderId)
    {
        $this->externalPartsOrderId = $externalPartsOrderId;
        return $this;
    }

    /**
     * Adds as partsOrderLinePushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType $partsOrderLinePushRequest
     */
    public function addToLines(\App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType $partsOrderLinePushRequest)
    {
        $this->lines[] = $partsOrderLinePushRequest;
        return $this;
    }

    /**
     * isset lines
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLines($index)
    {
        return isset($this->lines[$index]);
    }

    /**
     * unset lines
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLines($index)
    {
        unset($this->lines[$index]);
    }

    /**
     * Gets as lines
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType[]
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * Sets a new lines
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType[] $lines
     * @return self
     */
    public function setLines(array $lines)
    {
        $this->lines = $lines;
        return $this;
    }

    /**
     * Gets as orderInfo
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType
     */
    public function getOrderInfo()
    {
        return $this->orderInfo;
    }

    /**
     * Sets a new orderInfo
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType $orderInfo
     * @return self
     */
    public function setOrderInfo(\App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType $orderInfo)
    {
        $this->orderInfo = $orderInfo;
        return $this;
    }

    /**
     * Gets as partsOrderKey
     *
     * @return string
     */
    public function getPartsOrderKey()
    {
        return $this->partsOrderKey;
    }

    /**
     * Sets a new partsOrderKey
     *
     * @param string $partsOrderKey
     * @return self
     */
    public function setPartsOrderKey($partsOrderKey)
    {
        $this->partsOrderKey = $partsOrderKey;
        return $this;
    }

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }


}

