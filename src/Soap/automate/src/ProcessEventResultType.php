<?php

namespace App\Soap\automate\src;

/**
 * Class representing ProcessEventResultType
 *
 * 
 * XSD Type: processEventResult
 */
class ProcessEventResultType
{

    /**
     * @var string $response
     */
    private $response = null;

    /**
     * @var bool $businessError
     */
    private $businessError = null;

    /**
     * @var bool $systemError
     */
    private $systemError = null;

    /**
     * @var bool $retryable
     */
    private $retryable = null;

    /**
     * @var string $statusCode
     */
    private $statusCode = null;

    /**
     * Gets as response
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets a new response
     *
     * @param string $response
     * @return self
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Gets as businessError
     *
     * @return bool
     */
    public function getBusinessError()
    {
        return $this->businessError;
    }

    /**
     * Sets a new businessError
     *
     * @param bool $businessError
     * @return self
     */
    public function setBusinessError($businessError)
    {
        $this->businessError = $businessError;
        return $this;
    }

    /**
     * Gets as systemError
     *
     * @return bool
     */
    public function getSystemError()
    {
        return $this->systemError;
    }

    /**
     * Sets a new systemError
     *
     * @param bool $systemError
     * @return self
     */
    public function setSystemError($systemError)
    {
        $this->systemError = $systemError;
        return $this;
    }

    /**
     * Gets as retryable
     *
     * @return bool
     */
    public function getRetryable()
    {
        return $this->retryable;
    }

    /**
     * Sets a new retryable
     *
     * @param bool $retryable
     * @return self
     */
    public function setRetryable($retryable)
    {
        $this->retryable = $retryable;
        return $this;
    }

    /**
     * Gets as statusCode
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets a new statusCode
     *
     * @param string $statusCode
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


}

