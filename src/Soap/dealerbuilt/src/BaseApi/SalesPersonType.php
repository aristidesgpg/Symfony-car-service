<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

use App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType;

/**
 * Class representing SalesPersonType
 *
 * 
 * XSD Type: SalesPerson
 */
class SalesPersonType extends NumberedPersonInfoType
{

    /**
     * @var string $type
     */
    private $type = null;

    /**
     * Gets as type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


}

