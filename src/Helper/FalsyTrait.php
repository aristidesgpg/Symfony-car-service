<?php

namespace App\Helper;

trait FalsyTrait
{
    /**
     * @param $param
     * @return bool
     * @return bool
     */
    private function paramToBool($param): bool
    {
        return 'false' !== $param && true == $param;
    }
}
