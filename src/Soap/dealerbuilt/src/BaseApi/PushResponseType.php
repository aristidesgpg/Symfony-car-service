<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PushResponseType
 *
 * 
 * XSD Type: PushResponse
 */
class PushResponseType
{

    /**
     * @var string $externalRecordId
     */
    private $externalRecordId = null;

    /**
     * @var string $message
     */
    private $message = null;

    /**
     * @var string $pushResult
     */
    private $pushResult = null;

    /**
     * @var string $pushedRecordKey
     */
    private $pushedRecordKey = null;

    /**
     * Gets as externalRecordId
     *
     * @return string
     */
    public function getExternalRecordId()
    {
        return $this->externalRecordId;
    }

    /**
     * Sets a new externalRecordId
     *
     * @param string $externalRecordId
     * @return self
     */
    public function setExternalRecordId($externalRecordId)
    {
        $this->externalRecordId = $externalRecordId;
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
     * Gets as pushResult
     *
     * @return string
     */
    public function getPushResult()
    {
        return $this->pushResult;
    }

    /**
     * Sets a new pushResult
     *
     * @param string $pushResult
     * @return self
     */
    public function setPushResult($pushResult)
    {
        $this->pushResult = $pushResult;
        return $this;
    }

    /**
     * Gets as pushedRecordKey
     *
     * @return string
     */
    public function getPushedRecordKey()
    {
        return $this->pushedRecordKey;
    }

    /**
     * Sets a new pushedRecordKey
     *
     * @param string $pushedRecordKey
     * @return self
     */
    public function setPushedRecordKey($pushedRecordKey)
    {
        $this->pushedRecordKey = $pushedRecordKey;
        return $this;
    }


}

