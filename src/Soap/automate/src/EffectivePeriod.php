<?php

namespace App\Soap\automate\src;

/**
 * Class representing EffectivePeriod
 */
class EffectivePeriod
{

    /**
     * @var string $startDateTime
     */
    private $startDateTime = null;

    /**
     * Gets as startDateTime
     *
     * @return string
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * Sets a new startDateTime
     *
     * @param string $startDateTime
     * @return self
     */
    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;
        return $this;
    }


}

