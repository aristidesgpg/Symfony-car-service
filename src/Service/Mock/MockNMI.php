<?php

namespace App\Service\Mock;

use App\Entity\PaymentResponse;
use App\Service\NMI;

class MockNMI extends NMI
{
    protected function curl(string $type, array $data): PaymentResponse
    {
        switch ($type) {
            case 'sale':
                $response = [
                    'response_code' => 100,
                    'responsetext' => 'Success (MOCK)',
                    'transaction_id' => random_int(10000, 99999),
                ];
                break;
            case 'refund':
                $response = [
                    'response_code' => 100,
                    'responsetext' => 'Success (MOCK)',
                ];
                break;
            default:
                $response = [
                    'response_code' => 500,
                    'responsetext' => "Unknown operation {$type} (MOCK)",
                ];
        }
        $entity = new PaymentResponse($type, http_build_query($response));
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    protected function query(string $transactionId): array
    {
        return [
            'transaction' => [
                'cc_type' => 4,
                'cc_number' => random_int(1000, 9999),
            ],
        ];
    }
}
