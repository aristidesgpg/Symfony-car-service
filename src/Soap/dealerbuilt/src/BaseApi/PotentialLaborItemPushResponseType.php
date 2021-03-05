<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PotentialLaborItemPushResponseType
 *
 * 
 * XSD Type: PotentialLaborItemPushResponse
 */
class PotentialLaborItemPushResponseType
{

    /**
     * @var string $externalLaborOperationId
     */
    private $externalLaborOperationId = null;

    /**
     * @var string $jobKey
     */
    private $jobKey = null;

    /**
     * @var string $message
     */
    private $message = null;

    /**
     * @var string $result
     */
    private $result = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $sublets
     */
    private $sublets = null;

    /**
     * Gets as externalLaborOperationId
     *
     * @return string
     */
    public function getExternalLaborOperationId()
    {
        return $this->externalLaborOperationId;
    }

    /**
     * Sets a new externalLaborOperationId
     *
     * @param string $externalLaborOperationId
     * @return self
     */
    public function setExternalLaborOperationId($externalLaborOperationId)
    {
        $this->externalLaborOperationId = $externalLaborOperationId;
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

    /**
     * Adds as pushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse
     */
    public function addToSublets(\App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse)
    {
        $this->sublets[] = $pushResponse;
        return $this;
    }

    /**
     * isset sublets
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSublets($index)
    {
        return isset($this->sublets[$index]);
    }

    /**
     * unset sublets
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSublets($index)
    {
        unset($this->sublets[$index]);
    }

    /**
     * Gets as sublets
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    public function getSublets()
    {
        return $this->sublets;
    }

    /**
     * Sets a new sublets
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $sublets
     * @return self
     */
    public function setSublets(array $sublets)
    {
        $this->sublets = $sublets;
        return $this;
    }


}

