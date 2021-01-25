<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfLoggingType.
 *
 * XSD Type: ArrayOfLogging
 */
class ArrayOfLoggingType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LoggingType[]
     */
    private $logging = [
    ];

    /**
     * Adds as logging.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LoggingType $logging
     */
    public function addToLogging(LoggingType $logging)
    {
        $this->logging[] = $logging;

        return $this;
    }

    /**
     * isset logging.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLogging($index)
    {
        return isset($this->logging[$index]);
    }

    /**
     * unset logging.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLogging($index)
    {
        unset($this->logging[$index]);
    }

    /**
     * Gets as logging.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LoggingType[]
     */
    public function getLogging()
    {
        return $this->logging;
    }

    /**
     * Sets a new logging.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LoggingType[] $logging
     *
     * @return self
     */
    public function setLogging(array $logging)
    {
        $this->logging = $logging;

        return $this;
    }
}
