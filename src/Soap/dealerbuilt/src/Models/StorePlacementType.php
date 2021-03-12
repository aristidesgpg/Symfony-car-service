<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing StorePlacementType
 *
 * 
 * XSD Type: StorePlacement
 */
class StorePlacementType extends CompanyPlacementType
{

    /**
     * @var string $factoryDealerCode
     */
    private $factoryDealerCode = null;

    /**
     * @var int $lySetupLocationId
     */
    private $lySetupLocationId = null;

    /**
     * Gets as factoryDealerCode
     *
     * @return string
     */
    public function getFactoryDealerCode()
    {
        return $this->factoryDealerCode;
    }

    /**
     * Sets a new factoryDealerCode
     *
     * @param string $factoryDealerCode
     * @return self
     */
    public function setFactoryDealerCode($factoryDealerCode)
    {
        $this->factoryDealerCode = $factoryDealerCode;
        return $this;
    }

    /**
     * Gets as lySetupLocationId
     *
     * @return int
     */
    public function getLySetupLocationId()
    {
        return $this->lySetupLocationId;
    }

    /**
     * Sets a new lySetupLocationId
     *
     * @param int $lySetupLocationId
     * @return self
     */
    public function setLySetupLocationId($lySetupLocationId)
    {
        $this->lySetupLocationId = $lySetupLocationId;
        return $this;
    }


}

