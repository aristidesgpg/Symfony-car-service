<?php

namespace App\Soap\dealerbuilt\src\Models\ServiceCampaigns;

/**
 * Class representing ServiceCampaignType
 *
 * 
 * XSD Type: ServiceCampaign
 */
class ServiceCampaignType
{

    /**
     * @var string $campaignDescription
     */
    private $campaignDescription = null;

    /**
     * @var string $campaignDispositionCode
     */
    private $campaignDispositionCode = null;

    /**
     * @var string $campaignNotes
     */
    private $campaignNotes = null;

    /**
     * @var string $campaignNumber
     */
    private $campaignNumber = null;

    /**
     * @var string $customerMemo
     */
    private $customerMemo = null;

    /**
     * @var string $repairStatusCode
     */
    private $repairStatusCode = null;

    /**
     * @var string[] $serviceBulletinURI
     */
    private $serviceBulletinURI = null;

    /**
     * Gets as campaignDescription
     *
     * @return string
     */
    public function getCampaignDescription()
    {
        return $this->campaignDescription;
    }

    /**
     * Sets a new campaignDescription
     *
     * @param string $campaignDescription
     * @return self
     */
    public function setCampaignDescription($campaignDescription)
    {
        $this->campaignDescription = $campaignDescription;
        return $this;
    }

    /**
     * Gets as campaignDispositionCode
     *
     * @return string
     */
    public function getCampaignDispositionCode()
    {
        return $this->campaignDispositionCode;
    }

    /**
     * Sets a new campaignDispositionCode
     *
     * @param string $campaignDispositionCode
     * @return self
     */
    public function setCampaignDispositionCode($campaignDispositionCode)
    {
        $this->campaignDispositionCode = $campaignDispositionCode;
        return $this;
    }

    /**
     * Gets as campaignNotes
     *
     * @return string
     */
    public function getCampaignNotes()
    {
        return $this->campaignNotes;
    }

    /**
     * Sets a new campaignNotes
     *
     * @param string $campaignNotes
     * @return self
     */
    public function setCampaignNotes($campaignNotes)
    {
        $this->campaignNotes = $campaignNotes;
        return $this;
    }

    /**
     * Gets as campaignNumber
     *
     * @return string
     */
    public function getCampaignNumber()
    {
        return $this->campaignNumber;
    }

    /**
     * Sets a new campaignNumber
     *
     * @param string $campaignNumber
     * @return self
     */
    public function setCampaignNumber($campaignNumber)
    {
        $this->campaignNumber = $campaignNumber;
        return $this;
    }

    /**
     * Gets as customerMemo
     *
     * @return string
     */
    public function getCustomerMemo()
    {
        return $this->customerMemo;
    }

    /**
     * Sets a new customerMemo
     *
     * @param string $customerMemo
     * @return self
     */
    public function setCustomerMemo($customerMemo)
    {
        $this->customerMemo = $customerMemo;
        return $this;
    }

    /**
     * Gets as repairStatusCode
     *
     * @return string
     */
    public function getRepairStatusCode()
    {
        return $this->repairStatusCode;
    }

    /**
     * Sets a new repairStatusCode
     *
     * @param string $repairStatusCode
     * @return self
     */
    public function setRepairStatusCode($repairStatusCode)
    {
        $this->repairStatusCode = $repairStatusCode;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToServiceBulletinURI($string)
    {
        $this->serviceBulletinURI[] = $string;
        return $this;
    }

    /**
     * isset serviceBulletinURI
     *
     * @param int|string $index
     * @return bool
     */
    public function issetServiceBulletinURI($index)
    {
        return isset($this->serviceBulletinURI[$index]);
    }

    /**
     * unset serviceBulletinURI
     *
     * @param int|string $index
     * @return void
     */
    public function unsetServiceBulletinURI($index)
    {
        unset($this->serviceBulletinURI[$index]);
    }

    /**
     * Gets as serviceBulletinURI
     *
     * @return string[]
     */
    public function getServiceBulletinURI()
    {
        return $this->serviceBulletinURI;
    }

    /**
     * Sets a new serviceBulletinURI
     *
     * @param string[] $serviceBulletinURI
     * @return self
     */
    public function setServiceBulletinURI(array $serviceBulletinURI)
    {
        $this->serviceBulletinURI = $serviceBulletinURI;
        return $this;
    }


}

