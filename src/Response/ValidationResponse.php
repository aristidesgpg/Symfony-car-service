<?php

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ValidationResponse
 * @package App\Response
 */
class ValidationResponse extends JsonResponse {
    /**
     * ValidationResponse constructor.
     * @param array $validations $key => $msg
     */
    public function __construct (array $validations) {
        $data = [];
        foreach ($validations as $k=>$msg) {
            $data[] = ['key' => $k, 'msg' => $msg];
        }
        parent::__construct($data, 406);
    }
}