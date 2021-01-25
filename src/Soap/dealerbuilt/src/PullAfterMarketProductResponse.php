<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullAfterMarketProductResponse.
 */
class PullAfterMarketProductResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AfterMarketServiceProdutPullResponseType
     */
    private $pullAfterMarketProductResult = null;

    /**
     * Gets as pullAfterMarketProductResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AfterMarketServiceProdutPullResponseType
     */
    public function getPullAfterMarketProductResult()
    {
        return $this->pullAfterMarketProductResult;
    }

    /**
     * Sets a new pullAfterMarketProductResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AfterMarketServiceProdutPullResponseType $pullAfterMarketProductResult
     *
     * @return self
     */
    public function setPullAfterMarketProductResult(BaseApi\AfterMarketServiceProdutPullResponseType $pullAfterMarketProductResult)
    {
        $this->pullAfterMarketProductResult = $pullAfterMarketProductResult;

        return $this;
    }
}
