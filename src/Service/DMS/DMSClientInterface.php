<?php

namespace App\Service\DMS;

use App\Entity\RepairOrder;

/**
 * Interface DMSClientInterface.
 */
interface DMSClientInterface
{
    public function init();

    public function getOpenRepairOrders();

    /**
     * @param array $openRepairOrders
     * @return mixed
     */
    public function getClosedRoDetails(array $openRepairOrders);

    public static function getDefaultIndexName();
}
