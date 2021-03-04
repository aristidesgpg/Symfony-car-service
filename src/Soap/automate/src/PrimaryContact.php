<?php

namespace App\Soap\automate\src;

/**
 * Class representing PrimaryContact
 */
class PrimaryContact
{

    /**
     * @var string $typeCode
     */
    private $typeCode = null;

    /**
     * @var \App\Soap\automate\src\TelephoneCommunication $telephoneCommunication
     */
    private $telephoneCommunication = null;

    /**
     * Gets as typeCode
     *
     * @return string
     */
    public function getTypeCode()
    {
        return $this->typeCode;
    }

    /**
     * Sets a new typeCode
     *
     * @param string $typeCode
     * @return self
     */
    public function setTypeCode($typeCode)
    {
        $this->typeCode = $typeCode;
        return $this;
    }

    /**
     * Gets as telephoneCommunication
     *
     * @return \App\Soap\automate\src\TelephoneCommunication
     */
    public function getTelephoneCommunication()
    {
        return $this->telephoneCommunication;
    }

    /**
     * Sets a new telephoneCommunication
     *
     * @param \App\Soap\automate\src\TelephoneCommunication $telephoneCommunication
     * @return self
     */
    public function setTelephoneCommunication(\App\Soap\automate\src\TelephoneCommunication $telephoneCommunication)
    {
        $this->telephoneCommunication = $telephoneCommunication;
        return $this;
    }


}

