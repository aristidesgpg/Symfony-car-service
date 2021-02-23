<?php

namespace App\Soap\automate\src;

/**
 * Class representing RepairOrderStatus
 */
class RepairOrderStatus
{

    /**
     * @var string $statusText
     */
    private $statusText = null;

    /**
     * Gets as statusText
     *
     * @return string
     */
    public function getStatusText()
    {
        return $this->statusText;
    }

    /**
     * Sets a new statusText
     *
     * @param string $statusText
     * @return self
     */
    public function setStatusText($statusText)
    {
        $this->statusText = $statusText;
        return $this;
    }


}

