<?php

namespace App\Soap\automate\src;

/**
 * Class representing DealerParty
 */
class DealerParty
{

    /**
     * @var \App\Soap\automate\src\AlternatePartyDocument $alternatePartyDocument
     */
    private $alternatePartyDocument = null;

    /**
     * @var \App\Soap\automate\src\PartyActionEvent $partyActionEvent
     */
    private $partyActionEvent = null;

    /**
     * Gets as alternatePartyDocument
     *
     * @return \App\Soap\automate\src\AlternatePartyDocument
     */
    public function getAlternatePartyDocument()
    {
        return $this->alternatePartyDocument;
    }

    /**
     * Sets a new alternatePartyDocument
     *
     * @param \App\Soap\automate\src\AlternatePartyDocument $alternatePartyDocument
     * @return self
     */
    public function setAlternatePartyDocument(\App\Soap\automate\src\AlternatePartyDocument $alternatePartyDocument)
    {
        $this->alternatePartyDocument = $alternatePartyDocument;
        return $this;
    }

    /**
     * Gets as partyActionEvent
     *
     * @return \App\Soap\automate\src\PartyActionEvent
     */
    public function getPartyActionEvent()
    {
        return $this->partyActionEvent;
    }

    /**
     * Sets a new partyActionEvent
     *
     * @param \App\Soap\automate\src\PartyActionEvent $partyActionEvent
     * @return self
     */
    public function setPartyActionEvent(\App\Soap\automate\src\PartyActionEvent $partyActionEvent)
    {
        $this->partyActionEvent = $partyActionEvent;
        return $this;
    }


}

