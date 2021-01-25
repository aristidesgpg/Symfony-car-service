<?php

namespace App\Service\DMS;

/**
 * Interface DMSClientInterface.
 */
interface DMSClientInterface
{
    public function getOpenRepairOrders();

    public function getClosedRoDetails();

    public static function getDefaultIndexName();
}
