<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing SourcePlacementType
 *
 * 
 * XSD Type: SourcePlacement
 */
class SourcePlacementType extends EnvironmentPlacementType
{

    /**
     * @var int $dataSourceId
     */
    private $dataSourceId = null;

    /**
     * @var string $keyPrefix
     */
    private $keyPrefix = null;

    /**
     * Gets as dataSourceId
     *
     * @return int
     */
    public function getDataSourceId()
    {
        return $this->dataSourceId;
    }

    /**
     * Sets a new dataSourceId
     *
     * @param int $dataSourceId
     * @return self
     */
    public function setDataSourceId($dataSourceId)
    {
        $this->dataSourceId = $dataSourceId;
        return $this;
    }

    /**
     * Gets as keyPrefix
     *
     * @return string
     */
    public function getKeyPrefix()
    {
        return $this->keyPrefix;
    }

    /**
     * Sets a new keyPrefix
     *
     * @param string $keyPrefix
     * @return self
     */
    public function setKeyPrefix($keyPrefix)
    {
        $this->keyPrefix = $keyPrefix;
        return $this;
    }


}

