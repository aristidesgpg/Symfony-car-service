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
    private const REQUIRED_FIELDS = ['operationCode', 'description', 'preApproved', 'approved', 'partsPrice', 'suppliesPrice', 'laborPrice', 'notes'];

    /**
     * RepairOrderQuoteHelper constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * @param array $params
     * @param bool  $quoteRequiredFields
     *
     * @return array Empty on successful validation
     */
    public function validateParams(array $params): array
    {
        $errors = [];
        try {
            foreach ($params as $recommendation) {
                $fields = array();
                foreach ($recommendation as $field => $value) {
                    array_push($fields, $field);
                    $fields[$field] = $value;
                }
                foreach (self::REQUIRED_FIELDS as $field) {
                    if (!isset($fields[$field])) {
                        $errors[$field] = "Missing Field";
                    } else {
                        if ($fields[$field] === "") {
                            $errors[$field] = "Missing Value";
                        }
                        if ($field === "partsPrice" || $field === "suppliesPrice" || $field === "laborPrice") {
                            if (!is_numeric($fields[$field]))
                                $errors[$field] = "Invalid value";
                        }
                    }
                }
            }
        } catch (Exception $e) {
            $errors['error'] = $e->getMessage();
        }

        return $errors;
    }
}
