<?php

namespace App\Response;

use Swagger\Annotations as SWG;

class ValidationItem {
    /**
     * @var string
     * @SWG\Property(type="string")
     */
    private $key;

    /**
     * @var string
     * @SWG\Property(type="string", description="Validation message")
     */
    private $msg;

    /**
     * ValidationItem constructor.
     * @param string $key
     * @param string $msg
     */
    public function __construct(string $key, string $msg) {
        $this->key = $key;
        $this->msg = $msg;
    }

    /**
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getMsg(): string {
        return $this->msg;
    }
}