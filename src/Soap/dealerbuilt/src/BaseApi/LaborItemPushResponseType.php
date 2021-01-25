<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing LaborItemPushResponseType.
 *
 * XSD Type: LaborItemPushResponse
 */
class LaborItemPushResponseType
{
    /**
     * @var string
     */
    private $externalLaborOperationId = null;

    /**
     * @var int
     */
    private $jobNumber = null;

    /**
     * @var string
     */
    private $message = null;

    /**
     * @var string
     */
    private $repairOrderKey = null;

    /**
     * @var string
     */
    private $result = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    private $sublets = null;

    /**
     * Gets as externalLaborOperationId.
     *
     * @return string
     */
    public function getExternalLaborOperationId()
    {
        return $this->externalLaborOperationId;
    }

    /**
     * Sets a new externalLaborOperationId.
     *
     * @param string $externalLaborOperationId
     *
     * @return self
     */
    public function setExternalLaborOperationId($externalLaborOperationId)
    {
        $this->externalLaborOperationId = $externalLaborOperationId;

        return $this;
    }

    /**
     * Gets as jobNumber.
     *
     * @return int
     */
    public function getJobNumber()
    {
        return $this->jobNumber;
    }

    /**
     * Sets a new jobNumber.
     *
     * @param int $jobNumber
     *
     * @return self
     */
    public function setJobNumber($jobNumber)
    {
        $this->jobNumber = $jobNumber;

        return $this;
    }

    /**
     * Gets as message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets a new message.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Gets as repairOrderKey.
     *
     * @return string
     */
    public function getRepairOrderKey()
    {
        return $this->repairOrderKey;
    }

    /**
     * Sets a new repairOrderKey.
     *
     * @param string $repairOrderKey
     *
     * @return self
     */
    public function setRepairOrderKey($repairOrderKey)
    {
        $this->repairOrderKey = $repairOrderKey;

        return $this;
    }

    /**
     * Gets as result.
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Sets a new result.
     *
     * @param string $result
     *
     * @return self
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Gets as serviceLocationId.
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId.
     *
     * @param int $serviceLocationId
     *
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;

        return $this;
    }

    /**
     * Adds as pushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse
     */
    public function addToSublets(PushResponseType $pushResponse)
    {
        $this->sublets[] = $pushResponse;

        return $this;
    }

    /**
     * isset sublets.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSublets($index)
    {
        return isset($this->sublets[$index]);
    }

    /**
     * unset sublets.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSublets($index)
    {
        unset($this->sublets[$index]);
    }

    /**
     * Gets as sublets.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    public function getSublets()
    {
        return $this->sublets;
    }

    /**
     * Sets a new sublets.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $sublets
     *
     * @return self
     */
    public function setSublets(array $sublets)
    {
        $this->sublets = $sublets;

        return $this;
    }
}
