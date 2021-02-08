<?php

namespace App\Service;

use Exception;

/**
 * Class RepairOrderQuoteHelper
 *
 * @package App\Service
 */
class RepairOrderQuoteHelper
{
    /** @var string[] */
    private const REQUIRED_FIELDS = [
        'operationCode',
        'description',
        'preApproved',
        'approved',
        'partsPrice',
        'suppliesPrice',
        'laborPrice',
    ];

    /**
     * @throws Exception
     */
    public function validateRecommendationsJSON(array $params)
    {
        foreach ($params as $recommendation) {
            if (!is_object($recommendation)) {
                throw new Exception('Recommendations data is invalid');
            }

            $fields = [];
            foreach ($recommendation as $field => $value) {
                array_push($fields, $field);
                $fields[$field] = $value;
            }

            foreach (self::REQUIRED_FIELDS as $field) {
                if (!isset($fields[$field])) {
                    throw new Exception($field.' is missing in recommendations json');
                } else {
                    if ($fields[$field] === "") {
                        throw new Exception($field.' has no value in recommendations json');
                    }

                    if ($field == 'partsPrice' || $field == 'suppliesPrice' || $field == 'laborPrice') {
                        if (!is_numeric($fields[$field])) {
                            throw new Exception($field.' has invalid value in recommendations json');
                        }
                    }
                }
            }
        }
    }
}
