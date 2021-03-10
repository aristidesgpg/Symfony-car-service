<?php

namespace App\Soap\automate\src;

/**
 * Class representing TelephoneCommunication
 */
class TelephoneCommunication
{

    /**
     * @var string $channelCode
     */
    private $channelCode = null;

    /**
     * @var int $completeNumber
     */
    private $completeNumber = null;

    /**
     * @var string $extensionNumber
     */
    private $extensionNumber = null;

    /**
     * @var string $useCode
     */
    private $useCode = null;

    /**
     * @var \App\Soap\automate\src\Privacy[] $privacy
     */
    private $privacy = [
        
    ];

    /**
     * Gets as channelCode
     *
     * @return string
     */
    public function getChannelCode()
    {
        return $this->channelCode;
    }

    /**
     * Sets a new channelCode
     *
     * @param string $channelCode
     * @return self
     */
    public function setChannelCode($channelCode)
    {
        $this->channelCode = $channelCode;
        return $this;
    }

    /**
     * Gets as completeNumber
     *
     * @return int
     */
    public function getCompleteNumber()
    {
        return $this->completeNumber;
    }

    /**
     * Sets a new completeNumber
     *
     * @param int $completeNumber
     * @return self
     */
    public function setCompleteNumber($completeNumber)
    {
        $this->completeNumber = $completeNumber;
        return $this;
    }

    /**
     * Gets as extensionNumber
     *
     * @return string
     */
    public function getExtensionNumber()
    {
        return $this->extensionNumber;
    }

    /**
     * Sets a new extensionNumber
     *
     * @param string $extensionNumber
     * @return self
     */
    public function setExtensionNumber($extensionNumber)
    {
        $this->extensionNumber = $extensionNumber;
        return $this;
    }

    /**
     * Gets as useCode
     *
     * @return string
     */
    public function getUseCode()
    {
        return $this->useCode;
    }

    /**
     * Sets a new useCode
     *
     * @param string $useCode
     * @return self
     */
    public function setUseCode($useCode)
    {
        $this->useCode = $useCode;
        return $this;
    }

    /**
     * Adds as privacy
     *
     * @return self
     * @param \App\Soap\automate\src\Privacy $privacy
     */
    public function addToPrivacy(\App\Soap\automate\src\Privacy $privacy)
    {
        $this->privacy[] = $privacy;
        return $this;
    }

    /**
     * isset privacy
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPrivacy($index)
    {
        return isset($this->privacy[$index]);
    }

    /**
     * unset privacy
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPrivacy($index)
    {
        unset($this->privacy[$index]);
    }

    /**
     * Gets as privacy
     *
     * @return \App\Soap\automate\src\Privacy[]
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Sets a new privacy
     *
     * @param \App\Soap\automate\src\Privacy[] $privacy
     * @return self
     */
    public function setPrivacy(array $privacy)
    {
        $this->privacy = $privacy;
        return $this;
    }


}

