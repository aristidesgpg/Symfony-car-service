<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderJobPushResponseType.
 *
 * XSD Type: RepairOrderJobPushResponse
 */
class RepairOrderJobPushResponseType
{
    /**
     * @var string
     */
    private $externalJobId = null;

    /**
     * @var int
     */
    private $jobNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[]
     */
    private $laborItemPushResponses = null;

    /**
     * @var string
     */
    private $message = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    private $partPushResponses = null;

    /**
     * @var string
     */
    private $quickCode = null;

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
    private $technicianPushResponses = null;

    /**
     * Gets as externalJobId.
     *
     * @return string
     */
    public function getExternalJobId()
    {
        return $this->externalJobId;
    }

    /**
     * Sets a new externalJobId.
     *
     * @param string $externalJobId
     *
     * @return self
     */
    public function setExternalJobId($externalJobId)
    {
        $this->externalJobId = $externalJobId;

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
     * Adds as laborItemPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType $laborItemPushResponse
     */
    public function addToLaborItemPushResponses(LaborItemPushResponseType $laborItemPushResponse)
    {
        $this->laborItemPushResponses[] = $laborItemPushResponse;

        return $this;
    }

    /**
     * isset laborItemPushResponses.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLaborItemPushResponses($index)
    {
        return isset($this->laborItemPushResponses[$index]);
    }

    /**
     * unset laborItemPushResponses.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLaborItemPushResponses($index)
    {
        unset($this->laborItemPushResponses[$index]);
    }

    /**
     * Gets as laborItemPushResponses.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[]
     */
    public function getLaborItemPushResponses()
    {
        return $this->laborItemPushResponses;
    }

    /**
     * Sets a new laborItemPushResponses.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushResponseType[] $laborItemPushResponses
     *
     * @return self
     */
    public function setLaborItemPushResponses(array $laborItemPushResponses)
    {
        $this->laborItemPushResponses = $laborItemPushResponses;

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
     * Adds as pushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse
     */
    public function addToPartPushResponses(PushResponseType $pushResponse)
    {
        $this->partPushResponses[] = $pushResponse;

        return $this;
    }

    /**
     * isset partPushResponses.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartPushResponses($index)
    {
        return isset($this->partPushResponses[$index]);
    }

    /**
     * unset partPushResponses.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartPushResponses($index)
    {
        unset($this->partPushResponses[$index]);
    }

    /**
     * Gets as partPushResponses.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    public function getPartPushResponses()
    {
        return $this->partPushResponses;
    }

    /**
     * Sets a new partPushResponses.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $partPushResponses
     *
     * @return self
     */
    public function setPartPushResponses(array $partPushResponses)
    {
        $this->partPushResponses = $partPushResponses;

        return $this;
    }

    /**
     * Gets as quickCode.
     *
     * @return string
     */
    public function getQuickCode()
    {
        return $this->quickCode;
    }

    /**
     * Sets a new quickCode.
     *
     * @param string $quickCode
     *
     * @return self
     */
    public function setQuickCode($quickCode)
    {
        $this->quickCode = $quickCode;

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
    public function addToTechnicianPushResponses(PushResponseType $pushResponse)
    {
        $this->technicianPushResponses[] = $pushResponse;

        return $this;
    }

    /**
     * isset technicianPushResponses.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetTechnicianPushResponses($index)
    {
        return isset($this->technicianPushResponses[$index]);
    }

    /**
     * unset technicianPushResponses.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetTechnicianPushResponses($index)
    {
        unset($this->technicianPushResponses[$index]);
    }

    /**
     * Gets as technicianPushResponses.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    public function getTechnicianPushResponses()
    {
        return $this->technicianPushResponses;
    }

    /**
     * Sets a new technicianPushResponses.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $technicianPushResponses
     *
     * @return self
     */
    public function setTechnicianPushResponses(array $technicianPushResponses)
    {
        $this->technicianPushResponses = $technicianPushResponses;

        return $this;
    }
}
