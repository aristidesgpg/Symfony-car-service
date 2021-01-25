<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDropDownListDetailResponse
 */
class PullDropDownListDetailResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType[] $pullDropDownListDetailResult
     */
    private $pullDropDownListDetailResult = null;

    /**
     * Adds as dropdownListDetails
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType $dropdownListDetails
     */
    public function addToPullDropDownListDetailResult(\App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType $dropdownListDetails)
    {
        $this->pullDropDownListDetailResult[] = $dropdownListDetails;
        return $this;
    }

    /**
     * isset pullDropDownListDetailResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullDropDownListDetailResult($index)
    {
        return isset($this->pullDropDownListDetailResult[$index]);
    }

    /**
     * unset pullDropDownListDetailResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullDropDownListDetailResult($index)
    {
        unset($this->pullDropDownListDetailResult[$index]);
    }

    /**
     * Gets as pullDropDownListDetailResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType[]
     */
    public function getPullDropDownListDetailResult()
    {
        return $this->pullDropDownListDetailResult;
    }

    /**
     * Sets a new pullDropDownListDetailResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType[] $pullDropDownListDetailResult
     * @return self
     */
    public function setPullDropDownListDetailResult(array $pullDropDownListDetailResult)
    {
        $this->pullDropDownListDetailResult = $pullDropDownListDetailResult;
        return $this;
    }


}

