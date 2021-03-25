<?php

namespace App\Soap\automate\src;

/**
 * Class representing PartyActionEvent
 */
class PartyActionEvent
{

    /**
     * @var string $eventID
     */
    private $eventID = null;

    /**
     * @var string $eventDescription
     */
    private $eventDescription = null;

    /**
     * @var string $eventOccurrenceDateTime
     */
    private $eventOccurrenceDateTime = null;

    /**
     * Gets as eventID
     *
     * @return string
     */
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * Sets a new eventID
     *
     * @param string $eventID
     * @return self
     */
    public function setEventID($eventID)
    {
        $this->eventID = $eventID;
        return $this;
    }

    /**
     * Gets as eventDescription
     *
     * @return string
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * Sets a new eventDescription
     *
     * @param string $eventDescription
     * @return self
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;
        return $this;
    }

    /**
     * Gets as eventOccurrenceDateTime
     *
     * @return string
     */
    public function getEventOccurrenceDateTime()
    {
        return $this->eventOccurrenceDateTime;
    }

    /**
     * Sets a new eventOccurrenceDateTime
     *
     * @param string $eventOccurrenceDateTime
     * @return self
     */
    public function setEventOccurrenceDateTime($eventOccurrenceDateTime)
    {
        $this->eventOccurrenceDateTime = $eventOccurrenceDateTime;
        return $this;
    }


}

