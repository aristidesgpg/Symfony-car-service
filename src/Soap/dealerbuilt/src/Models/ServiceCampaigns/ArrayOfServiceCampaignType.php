<?php

namespace App\Soap\dealerbuilt\src\Models\ServiceCampaigns;

/**
 * Class representing ArrayOfServiceCampaignType
 *
 * 
 * XSD Type: ArrayOfServiceCampaign
 */
class ArrayOfServiceCampaignType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType[] $serviceCampaign
     */
    private $serviceCampaign = [
        
    ];

    /**
     * Adds as serviceCampaign
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType $serviceCampaign
     */
    public function addToServiceCampaign(\App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType $serviceCampaign)
    {
        $this->serviceCampaign[] = $serviceCampaign;
        return $this;
    }

    /**
     * isset serviceCampaign
     *
     * @param int|string $index
     * @return bool
     */
    public function issetServiceCampaign($index)
    {
        return isset($this->serviceCampaign[$index]);
    }

    /**
     * unset serviceCampaign
     *
     * @param int|string $index
     * @return void
     */
    public function unsetServiceCampaign($index)
    {
        unset($this->serviceCampaign[$index]);
    }

    /**
     * Gets as serviceCampaign
     *
     * @return \App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType[]
     */
    public function getServiceCampaign()
    {
        return $this->serviceCampaign;
    }

    /**
     * Sets a new serviceCampaign
     *
     * @param \App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType[] $serviceCampaign
     * @return self
     */
    public function setServiceCampaign(array $serviceCampaign)
    {
        $this->serviceCampaign = $serviceCampaign;
        return $this;
    }


}

