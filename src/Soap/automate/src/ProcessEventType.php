<?php

namespace App\Soap\automate\src;

/**
 * Class representing ProcessEventType
 *
 * 
 * XSD Type: processEvent
 */
class ProcessEventType
{

    /**
     * @var \App\Soap\automate\src\AuthenticationTokenType $authenticationToken
     */
    private $authenticationToken = null;

    /**
     * @var int $sourceThirdPartyId
     */
    private $sourceThirdPartyId = null;

    /**
     * @var int $dealerEndpointId
     */
    private $dealerEndpointId = null;

    /**
     * @var string $eventType
     */
    private $eventType = null;

    /**
     * @var string $payload
     */
    private $payload = null;

    /**
     * @var string $payloadVersion
     */
    private $payloadVersion = null;

    /**
     * Gets as authenticationToken
     *
     * @return \App\Soap\automate\src\AuthenticationTokenType
     */
    public function getAuthenticationToken()
    {
        return $this->authenticationToken;
    }

    /**
     * Sets a new authenticationToken
     *
     * @param \App\Soap\automate\src\AuthenticationTokenType $authenticationToken
     * @return self
     */
    public function setAuthenticationToken(\App\Soap\automate\src\AuthenticationTokenType $authenticationToken)
    {
        $this->authenticationToken = $authenticationToken;
        return $this;
    }

    /**
     * Gets as sourceThirdPartyId
     *
     * @return int
     */
    public function getSourceThirdPartyId()
    {
        return $this->sourceThirdPartyId;
    }

    /**
     * Sets a new sourceThirdPartyId
     *
     * @param int $sourceThirdPartyId
     * @return self
     */
    public function setSourceThirdPartyId($sourceThirdPartyId)
    {
        $this->sourceThirdPartyId = $sourceThirdPartyId;
        return $this;
    }

    /**
     * Gets as dealerEndpointId
     *
     * @return int
     */
    public function getDealerEndpointId()
    {
        return $this->dealerEndpointId;
    }

    /**
     * Sets a new dealerEndpointId
     *
     * @param int $dealerEndpointId
     * @return self
     */
    public function setDealerEndpointId($dealerEndpointId)
    {
        $this->dealerEndpointId = $dealerEndpointId;
        return $this;
    }

    /**
     * Gets as eventType
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Sets a new eventType
     *
     * @param string $eventType
     * @return self
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * Gets as payload
     *
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Sets a new payload
     *
     * @param string $payload
     * @return self
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * Gets as payloadVersion
     *
     * @return string
     */
    public function getPayloadVersion()
    {
        return $this->payloadVersion;
    }

    /**
     * Sets a new payloadVersion
     *
     * @param string $payloadVersion
     * @return self
     */
    public function setPayloadVersion($payloadVersion)
    {
        $this->payloadVersion = $payloadVersion;
        return $this;
    }


}

