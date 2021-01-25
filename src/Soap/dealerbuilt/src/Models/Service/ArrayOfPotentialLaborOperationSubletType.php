<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPotentialLaborOperationSubletType
 *
 * 
 * XSD Type: ArrayOfPotentialLaborOperationSublet
 */
class ArrayOfPotentialLaborOperationSubletType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborOperationSubletType[] $potentialLaborOperationSublet
     */
    private $potentialLaborOperationSublet = [
        
    ];

    /**
     * Adds as potentialLaborOperationSublet
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborOperationSubletType $potentialLaborOperationSublet
     */
    public function addToPotentialLaborOperationSublet(\App\Soap\dealerbuilt\src\Models\Service\PotentialLaborOperationSubletType $potentialLaborOperationSublet)
    {
        $this->potentialLaborOperationSublet[] = $potentialLaborOperationSublet;
        return $this;
    }

    /**
     * isset potentialLaborOperationSublet
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPotentialLaborOperationSublet($index)
    {
        return isset($this->potentialLaborOperationSublet[$index]);
    }

    /**
     * unset potentialLaborOperationSublet
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPotentialLaborOperationSublet($index)
    {
        unset($this->potentialLaborOperationSublet[$index]);
    }

    /**
     * Gets as potentialLaborOperationSublet
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborOperationSubletType[]
     */
    public function getPotentialLaborOperationSublet()
    {
        return $this->potentialLaborOperationSublet;
    }

    /**
     * Sets a new potentialLaborOperationSublet
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborOperationSubletType[] $potentialLaborOperationSublet
     * @return self
     */
    public function setPotentialLaborOperationSublet(array $potentialLaborOperationSublet)
    {
        $this->potentialLaborOperationSublet = $potentialLaborOperationSublet;
        return $this;
    }


}

