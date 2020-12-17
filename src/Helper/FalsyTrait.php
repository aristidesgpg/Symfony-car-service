<?php

namespace App\Helper;

trait FalsyTrait {
    /**
     * @param $param
     *
     * @return bool
     */
    private function paramToBool ($param): bool {
        return ($param !== 'false' && $param == true);
    }
}