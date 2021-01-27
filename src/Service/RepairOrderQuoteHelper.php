<?php

namespace App\Service;

use Exception;
use JsonException;

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
     * @return string Empty on successful validation
     */
    public function validateParams(array $params)
    {

        try {
            foreach ($params as $recommendation) {
                if (!is_object($recommendation))
                    return "recommendations data is invalid";
                $fields = array();
                foreach ($recommendation as $field => $value) {
                    array_push($fields, $field);
                    $fields[$field] = $value;
                }
                foreach (self::REQUIRED_FIELDS as $field) {

                    if (!isset($fields[$field])) {
                        return "$field is missing in recommendations";
                    } else {
                        if ($fields[$field] === "") {
                            return "$field has not value in recommendations";
                        }
                        if ($field === "partsPrice" || $field === "suppliesPrice" || $field === "laborPrice") {
                            if (!is_numeric($fields[$field])) {
                                return "$field has invalid value in recommendations";
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return "";
    }
}
