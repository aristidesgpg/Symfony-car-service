<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PotentialJobPushResponseType
 *
 * 
 * XSD Type: PotentialJobPushResponse
 */
class PotentialJobPushResponseType
{

    /**
     * @var string $externalJobId
     */
    private $externalJobId = null;

    /**
     * @var string $jobKey
     */
    private $jobKey = null;

    /**
     * @var int $jobNumber
     */
    private $jobNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[] $laborItemPushResponses
     */
    private $laborItemPushResponses = null;

    /**
     * @var string $message
     */
    private $message = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $partPushResponses
     */
    private $partPushResponses = null;

    /**
     * @var string $result
     */
    private $result = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as externalJobId
     *
     * @return string
     */
    public function getExternalJobId()
    {
        return $this->externalJobId;
    }

    /**
     * Sets a new externalJobId
     *
     * @param string $externalJobId
     * @return self
     */
    public function setExternalJobId($externalJobId)
    {
        $this->externalJobId = $externalJobId;
        return $this;
    }

    /**
     * Gets as jobKey
     *
     * @return string
     */
    public function getJobKey()
    {
        return $this->jobKey;
    }

    /**
     * Sets a new jobKey
     *
     * @param string $jobKey
     * @return self
     */
    public function setJobKey($jobKey)
    {
        $this->jobKey = $jobKey;
        return $this;
    }

    /**
     * Gets as jobNumber
     *
     * @return int
     */
    public function getJobNumber()
    {
        return $this->jobNumber;
    }

    /**
     * Sets a new jobNumber
     *
     * @param int $jobNumber
     * @return self
     */
    public function setJobNumber($jobNumber)
    {
        $this->jobNumber = $jobNumber;
        return $this;
    }

    /**
     * Adds as potentialLaborItemPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType $potentialLaborItemPushResponse
     */
    public function addToLaborItemPushResponses(\App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType $potentialLaborItemPushResponse)
    {
        $this->laborItemPushResponses[] = $potentialLaborItemPushResponse;
        return $this;
    }

    /**
     * isset laborItemPushResponses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLaborItemPushResponses($index)
    {
        return isset($this->laborItemPushResponses[$index]);
    }

    /**
     * unset laborItemPushResponses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLaborItemPushResponses($index)
    {
        unset($this->laborItemPushResponses[$index]);
    }

    /**
     * Gets as laborItemPushResponses
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[]
     */
    public function getLaborItemPushResponses()
    {
        return $this->laborItemPushResponses;
    }

    /**
     * Sets a new laborItemPushResponses
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[] $laborItemPushResponses
     * @return self
     */
    public function setLaborItemPushResponses(array $laborItemPushResponses)
    {
        $this->laborItemPushResponses = $laborItemPushResponses;
        return $this;
    }

    /**
     * Gets as message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets a new message
     *
     * @param string $message
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Adds as pushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse
     */
    public function addToPartPushResponses(\App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse)
    {
        $this->partPushResponses[] = $pushResponse;
        return $this;
    }

    /**
     * isset partPushResponses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartPushResponses($index)
    {
        return isset($this->partPushResponses[$index]);
    }

    /**
     * unset partPushResponses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartPushResponses($index)
    {
        unset($this->partPushResponses[$index]);
    }

    /**
     * Gets as partPushResponses
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    public function getPartPushResponses()
    {
        return $this->partPushResponses;
    }

    /**
     * Sets a new partPushResponses
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $partPushResponses
     * @return self
     */
    public function setPartPushResponses(array $partPushResponses)
    {
        $this->partPushResponses = $partPushResponses;
        return $this;
    }

    /**
     * Gets as result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Sets a new result
     *
     * @param string $result
     * @return self
     */
    public function setResult($result)
    {
        $this->result = $result;
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

