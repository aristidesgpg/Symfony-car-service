<?php

namespace App\Soap\cdk\src;

/**
 * Class representing FeeOpCodeDesc
 */
class FeeOpCodeDesc
{
    /**
     * @var \App\Soap\cdk\src\V $v
     */
    private $v = null;

    /**
     * Gets as v
     *
     * @return \App\Soap\cdk\src\V
     */
    public function getV()
    {
        return $this->v;
    }

    /**
     * Sets a new v
     *
     * @param \App\Soap\cdk\src\V $v
     * @return self
     */
    public function setV(\App\Soap\cdk\src\V $v)
    {
        $this->v = $v;
        return $this;
    }

}

