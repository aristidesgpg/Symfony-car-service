<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing PushResponseType.
 *
 * XSD Type: PushResponse
 */
class PushResponseType
{
    /**
     * @var string
     */
    private $externalRecordId = null;

    /**
     * @var string
     */
    private $message = null;

    /**
     * @var string
     */
    private $pushResult = null;

    /**
     * @var int
     */
    private $pushedRecordId = null;

    /**
     * Gets as externalRecordId.
     *
     * @return string
     */
    public function getExternalRecordId()
    {
        return $this->externalRecordId;
    }

    /**
     * Sets a new externalRecordId.
     *
     * @param string $externalRecordId
     *
     * @return self
     */
    public function setExternalRecordId($externalRecordId)
    {
        $this->externalRecordId = $externalRecordId;

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
     * Gets as pushResult.
     *
     * @return string
     */
    public function getPushResult()
    {
        return $this->pushResult;
    }

    /**
     * Sets a new pushResult.
     *
     * @param string $pushResult
     *
     * @return self
     */
    public function setPushResult($pushResult)
    {
        $this->pushResult = $pushResult;

        return $this;
    }

    /**
     * Gets as pushedRecordId.
     *
     * @return int
     */
    public function getPushedRecordId()
    {
        return $this->pushedRecordId;
    }

    /**
     * Sets a new pushedRecordId.
     *
     * @param int $pushedRecordId
     *
     * @return self
     */
    public function setPushedRecordId($pushedRecordId)
    {
        $this->pushedRecordId = $pushedRecordId;

        return $this;
    }
}
