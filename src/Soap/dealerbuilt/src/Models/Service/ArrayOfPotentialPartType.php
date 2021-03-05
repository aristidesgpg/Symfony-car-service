<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfPotentialPartType
 *
 * 
 * XSD Type: ArrayOfPotentialPart
 */
class ArrayOfPotentialPartType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType[] $potentialPart
     */
    private $potentialPart = [
        
    ];

    /**
     * Adds as potentialPart
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType $potentialPart
     */
    public function addToPotentialPart(\App\Soap\dealerbuilt\src\Models\Service\PotentialPartType $potentialPart)
    {
        $this->potentialPart[] = $potentialPart;
        return $this;
    }

    /**
     * isset potentialPart
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPotentialPart($index)
    {
        return isset($this->potentialPart[$index]);
    }

    /**
     * unset potentialPart
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPotentialPart($index)
    {
        unset($this->potentialPart[$index]);
    }

    /**
     * Gets as potentialPart
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType[]
     */
    public function getPotentialPart()
    {
        return $this->potentialPart;
    }

    /**
     * Sets a new potentialPart
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType[] $potentialPart
     * @return self
     */
    public function setPotentialPart(array $potentialPart)
    {
        $this->potentialPart = $potentialPart;
        return $this;
    }


}

