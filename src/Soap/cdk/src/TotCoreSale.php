<?php

namespace App\Soap\cdk\src;

/**
 * Class representing TotCoreSale
 */
class TotCoreSale
{

    /**
     * @var \App\Soap\cdk\src\V[] $v
     */
    private $v = [
        
    ];

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToV(\App\Soap\cdk\src\V $v)
    {
        $this->v[] = $v;
        return $this;
    }

    /**
     * isset v
     *
     * @param int|string $index
     * @return bool
     */
    public function issetV($index)
    {
        return isset($this->v[$index]);
    }

    /**
     * unset v
     *
     * @param int|string $index
     * @return void
     */
    public function unsetV($index)
    {
        unset($this->v[$index]);
    }

    /**
     * Gets as v
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getV()
    {
        return $this->v;
    }

    /**
     * Sets a new v
     *
     * @param \App\Soap\cdk\src\V[] $v
     * @return self
     */
    public function setV(array $v)
    {
        $this->v = $v;
        return $this;
    }


}

