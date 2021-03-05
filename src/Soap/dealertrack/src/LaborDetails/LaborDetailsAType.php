<?php

namespace App\Soap\dealertrack\src\LaborDetails;

/**
 * Class representing LaborDetailsAType
 */
class LaborDetailsAType
{

    /**
     * @var \App\Soap\dealertrack\src\Labor[] $labor
     */
    private $labor = [
        
    ];

    /**
     * Adds as labor
     *
     * @return self
     * @param \App\Soap\dealertrack\src\Labor $labor
     */
    public function addToLabor(\App\Soap\dealertrack\src\Labor $labor)
    {
        $this->labor[] = $labor;
        return $this;
    }

    /**
     * isset labor
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLabor($index)
    {
        return isset($this->labor[$index]);
    }

    /**
     * unset labor
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLabor($index)
    {
        unset($this->labor[$index]);
    }

    /**
     * Gets as labor
     *
     * @return \App\Soap\dealertrack\src\Labor[]
     */
    public function getLabor()
    {
        return $this->labor;
    }

    /**
     * Sets a new labor
     *
     * @param \App\Soap\dealertrack\src\Labor[] $labor
     * @return self
     */
    public function setLabor(array $labor)
    {
        $this->labor = $labor;
        return $this;
    }


}

