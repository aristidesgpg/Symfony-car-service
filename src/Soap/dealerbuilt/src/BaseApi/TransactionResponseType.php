<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing TransactionResponseType
 *
 * 
 * XSD Type: TransactionResponse
 */
class TransactionResponseType
{

    /**
     * @var string $message
     */
    private $message = null;

    /**
     * @var string $recordKey
     */
    private $recordKey = null;

    /**
     * @var string $result
     */
    private $result = null;

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
     * Gets as recordKey
     *
     * @return string
     */
    public function getRecordKey()
    {
        return $this->recordKey;
    }

    /**
     * Sets a new recordKey
     *
     * @param string $recordKey
     * @return self
     */
    public function setRecordKey($recordKey)
    {
        $this->recordKey = $recordKey;
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


}

