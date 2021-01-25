<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing EstimateJobType.
 *
 * XSD Type: EstimateJob
 */
class EstimateJobType extends ApiServiceLocationItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialJobAttributesType
     */
    private $attributes = null;

    /**
     * @var string
     */
    private $estimateJobKey = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialJobAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes.
     *
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Service\PotentialJobAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as estimateJobKey.
     *
     * @return string
     */
    public function getEstimateJobKey()
    {
        return $this->estimateJobKey;
    }

    /**
     * Sets a new estimateJobKey.
     *
     * @param string $estimateJobKey
     *
     * @return self
     */
    public function setEstimateJobKey($estimateJobKey)
    {
        $this->estimateJobKey = $estimateJobKey;

        return $this;
    }
}
