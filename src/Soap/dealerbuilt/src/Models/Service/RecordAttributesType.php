<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing RecordAttributesType
 *
 * 
 * XSD Type: RecordAttributes
 */
class RecordAttributesType
{

    /**
     * @var \DateTime $modifiedStamp
     */
    private $modifiedStamp = null;

    /**
     * Gets as modifiedStamp
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp
     *
     * @param \DateTime $modifiedStamp
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;
        return $this;
    }


}

