<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing EnvironmentPlacementType
 *
 * 
 * XSD Type: EnvironmentPlacement
 */
class EnvironmentPlacementType extends GroupPlacementType
{

    /**
     * @var int $environmentId
     */
    private $environmentId = null;

    /**
     * @var string $environmentType
     */
    private $environmentType = null;

    /**
     * Gets as environmentId
     *
     * @return int
     */
    public function getEnvironmentId()
    {
        return $this->environmentId;
    }

    /**
     * Sets a new environmentId
     *
     * @param int $environmentId
     * @return self
     */
    public function setEnvironmentId($environmentId)
    {
        $this->environmentId = $environmentId;
        return $this;
    }

    /**
     * Gets as environmentType
     *
     * @return string
     */
    public function getEnvironmentType()
    {
        return $this->environmentType;
    }

    /**
     * Sets a new environmentType
     *
     * @param string $environmentType
     * @return self
     */
    public function setEnvironmentType($environmentType)
    {
        $this->environmentType = $environmentType;
        return $this;
    }


}

