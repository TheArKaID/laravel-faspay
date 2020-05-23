<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Err;

use \JsonSerializable;

class UnregisteredError implements JsonSerializable {
    public  $response_error;

    function getResponse_error() {
        return $this->response_error;
    }

    function setResponse_error($response_error) {
        $this->response_error = $response_error;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
