<?php


namespace App\Service\DMS;


class CDKClient extends AbstractDMSClient
{

    public function getOpenRepairOrders()
    {
        // TODO: Implement getOpenRepairOrders() method.
    }

    public function getClosedRoDetails()
    {
        // TODO: Implement getClosedRoDetails() method.
    }

    public static function getDefaultIndexName()
    {
        return 'usingCdk';

    }
}