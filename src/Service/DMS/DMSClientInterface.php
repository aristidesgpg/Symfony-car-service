<?php

namespace App\Service\DMS;

/**
 * Interface DMSClientInterface.
 */
interface DMSClientInterface
{
    public function init(): void;

    public function getOpenRepairOrders(): array;

    public function getRepairOrderByNumber(string $RONumber);

    /**
     * @return mixed
     */
    public function getClosedRoDetails(array $openRepairOrders): array;

    public static function getDefaultIndexName(): string;

    public function getParts(): array;

    public function getOperationCodes(): array;


}
