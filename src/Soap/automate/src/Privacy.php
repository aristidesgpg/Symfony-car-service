<?php

namespace App\Soap\automate\src;

/**
 * Class representing Privacy
 */
class Privacy
{

    /**
     * @var bool $privacyIndicator
     */
    private $privacyIndicator = null;

    /**
     * @var string $privacyTypeString
     */
    private $privacyTypeString = null;

    /**
     * Gets as privacyIndicator
     *
     * @return bool
     */
    public function getPrivacyIndicator()
    {
        return $this->privacyIndicator;
    }

    /**
     * Sets a new privacyIndicator
     *
     * @param bool $privacyIndicator
     * @return self
     */
    public function setPrivacyIndicator($privacyIndicator)
    {
        $this->privacyIndicator = $privacyIndicator;
        return $this;
    }

    /**
     * Gets as privacyTypeString
     *
     * @return string
     */
    public function getPrivacyTypeString()
    {
        return $this->privacyTypeString;
    }

    /**
     * Sets a new privacyTypeString
     *
     * @param string $privacyTypeString
     * @return self
     */
    public function setPrivacyTypeString($privacyTypeString)
    {
        $this->privacyTypeString = $privacyTypeString;
        return $this;
    }


}

