<?php

namespace App\Soap\automate\src;

/**
 * Class representing ColorGroup
 */
class ColorGroup
{

    /**
     * @var string $colorItemCode
     */
    private $colorItemCode = null;

    /**
     * @var string $colorDescription
     */
    private $colorDescription = null;

    /**
     * Gets as colorItemCode
     *
     * @return string
     */
    public function getColorItemCode()
    {
        return $this->colorItemCode;
    }

    /**
     * Sets a new colorItemCode
     *
     * @param string $colorItemCode
     * @return self
     */
    public function setColorItemCode($colorItemCode)
    {
        $this->colorItemCode = $colorItemCode;
        return $this;
    }

    /**
     * Gets as colorDescription
     *
     * @return string
     */
    public function getColorDescription()
    {
        return $this->colorDescription;
    }

    /**
     * Sets a new colorDescription
     *
     * @param string $colorDescription
     * @return self
     */
    public function setColorDescription($colorDescription)
    {
        $this->colorDescription = $colorDescription;
        return $this;
    }


}

