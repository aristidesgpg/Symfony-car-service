<?php

namespace App\Soap\dealerbuilt\src\Models\Appointments;

/**
 * Class representing ArrayOfConcernType
 *
 * 
 * XSD Type: ArrayOfConcern
 */
class ArrayOfConcernType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType[] $concern
     */
    private $concern = [
        
    ];

    /**
     * Adds as concern
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType $concern
     */
    public function addToConcern(\App\Soap\dealerbuilt\src\Models\Appointments\ConcernType $concern)
    {
        $this->concern[] = $concern;
        return $this;
    }

    /**
     * isset concern
     *
     * @param int|string $index
     * @return bool
     */
    public function issetConcern($index)
    {
        return isset($this->concern[$index]);
    }

    /**
     * unset concern
     *
     * @param int|string $index
     * @return void
     */
    public function unsetConcern($index)
    {
        unset($this->concern[$index]);
    }

    /**
     * Gets as concern
     *
     * @return \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType[]
     */
    public function getConcern()
    {
        return $this->concern;
    }

    /**
     * Sets a new concern
     *
     * @param \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType[] $concern
     * @return self
     */
    public function setConcern(array $concern)
    {
        $this->concern = $concern;
        return $this;
    }


}

