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
     * @return array Empty on successful validation
     */
    public function validateParams($params): array
    {
        $errors = [];

        if (!is_array($params) || count($params) === 0)
            return ["Type error" => "recommendations data is invalid"];

        try {
            foreach ($params as $recommendation) {

                if (!is_object($recommendation))
                    return ["Type error" => "recommendations data is invalid"];

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
                            if (!is_numeric($fields[$field])) {
                                $errors[$field] = "Invalid value";
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
            $errors['error'] = $e->getMessage();
        }

        return $errors;
    }

    /**
     * @param string $json
     *
     * @return array 
     */
    public function jsonParse(string $json)
    {
        $newJSON = '';

        $jsonLength = strlen($json);
        for ($i = 0; $i < $jsonLength; $i++) {
            if ($json[$i] == '"' || $json[$i] == "'") {
                $nextQuote = strpos($json, $json[$i], $i + 1);
                $quoteContent = substr($json, $i + 1, $nextQuote - $i - 1);
                $newJSON .= '"' . str_replace('"', "'", $quoteContent) . '"';
                $i = $nextQuote;
            } else {
                $newJSON .= $json[$i];
            }
        }

        return $newJSON;
    }
}
