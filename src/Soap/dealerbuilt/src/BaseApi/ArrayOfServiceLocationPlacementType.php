<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfServiceLocationPlacementType.
 *
 * XSD Type: ArrayOfServiceLocationPlacement
 */
class ArrayOfServiceLocationPlacementType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType[]
     */
    private $serviceLocationPlacement = [
    ];

    /**
     * Adds as serviceLocationPlacement.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType $serviceLocationPlacement
     */
    public function addToServiceLocationPlacement(ServiceLocationPlacementType $serviceLocationPlacement)
    {
        $this->serviceLocationPlacement[] = $serviceLocationPlacement;

        return $this;
    }

    /**
     * isset serviceLocationPlacement.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceLocationPlacement($index)
    {
        return isset($this->serviceLocationPlacement[$index]);
    }

    /**
     * unset serviceLocationPlacement.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceLocationPlacement($index)
    {
        unset($this->serviceLocationPlacement[$index]);
    }

    /**
     * Gets as serviceLocationPlacement.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType[]
     */
    public function getServiceLocationPlacement()
    {
        return $this->serviceLocationPlacement;
    }

    /**
     * Sets a new serviceLocationPlacement.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType[] $serviceLocationPlacement
     *
     * @return self
     */
    public function setServiceLocationPlacement(array $serviceLocationPlacement)
    {
        $this->serviceLocationPlacement = $serviceLocationPlacement;

        return $this;
    }
}
