<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfLaborOperationSubletType
 *
 * 
 * XSD Type: ArrayOfLaborOperationSublet
 */
class ArrayOfLaborOperationSubletType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType[] $laborOperationSublet
     */
    private $laborOperationSublet = [
        
    ];

    /**
     * Adds as laborOperationSublet
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType $laborOperationSublet
     */
    public function addToLaborOperationSublet(\App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType $laborOperationSublet)
    {
        $this->laborOperationSublet[] = $laborOperationSublet;
        return $this;
    }

    /**
     * isset laborOperationSublet
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLaborOperationSublet($index)
    {
        return isset($this->laborOperationSublet[$index]);
    }

    /**
     * unset laborOperationSublet
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLaborOperationSublet($index)
    {
        unset($this->laborOperationSublet[$index]);
    }

    /**
     * Gets as laborOperationSublet
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType[]
     */
    public function getLaborOperationSublet()
    {
        return $this->laborOperationSublet;
    }

    /**
     * Sets a new laborOperationSublet
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType[] $laborOperationSublet
     * @return self
     */
    public function setLaborOperationSublet(array $laborOperationSublet)
    {
        $this->laborOperationSublet = $laborOperationSublet;
        return $this;
    }


}

