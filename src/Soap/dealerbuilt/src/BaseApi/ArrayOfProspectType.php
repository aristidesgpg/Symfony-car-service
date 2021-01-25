<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfProspectType
 *
 * 
 * XSD Type: ArrayOfProspect
 */
class ArrayOfProspectType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProspectType[] $prospect
     */
    private $prospect = [
        
    ];

    /**
     * Adds as prospect
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectType $prospect
     */
    public function addToProspect(\App\Soap\dealerbuilt\src\BaseApi\ProspectType $prospect)
    {
        $this->prospect[] = $prospect;
        return $this;
    }

    /**
     * isset prospect
     *
     * @param int|string $index
     * @return bool
     */
    public function issetProspect($index)
    {
        return isset($this->prospect[$index]);
    }

    /**
     * unset prospect
     *
     * @param int|string $index
     * @return void
     */
    public function unsetProspect($index)
    {
        unset($this->prospect[$index]);
    }

    /**
     * Gets as prospect
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProspectType[]
     */
    public function getProspect()
    {
        return $this->prospect;
    }

    /**
     * Sets a new prospect
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProspectType[] $prospect
     * @return self
     */
    public function setProspect(array $prospect)
    {
        $this->prospect = $prospect;
        return $this;
    }


}

