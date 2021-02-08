<?php


namespace App\Service\DMS;


use App\Entity\RepairOrder;

class CDKClient extends AbstractDMSClient
{

    public function init(){}

    public function getOpenRepairOrders()
    {
        // TODO: Implement getOpenRepairOrders() method.
    }

    public function getClosedRoDetails(array $openRepairOrders)
    {
        // TODO: Implement getClosedRoDetails() method.
    }

    public static function getDefaultIndexName()
    {
        return 'usingCdk';

    }
}