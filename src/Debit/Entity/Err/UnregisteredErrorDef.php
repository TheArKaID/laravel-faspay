<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Err;

use \JsonSerializable;

class UnregisteredErrorDef implements JsonSerializable{

    public $response_code;   
    public $response_desc;
    
    function getResponse_code() {
        return $this->response_code;
    }

    function getResponse_desc() {
        return $this->response_desc;
    }

    function setResponse_code($response_code) {
        $this->response_code = $response_code;
    }

    function setResponse_desc($response_desc) {
        $this->response_desc = $response_desc;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
