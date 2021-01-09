<?php

namespace App\Helper;

trait FalsyTrait
{
    /**
     * @param $param
     */
    private function paramToBool($param): bool
    {
        return 'false' !== $param && true == $param;
    }
}
