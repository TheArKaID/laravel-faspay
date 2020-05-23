<?php

namespace TheArKaID\LaravelFaspay\Debit\Rest;

use Karriere\JsonDecoder\JsonDecoder;
use TheArKaID\LaravelFaspay\Debit\FaspayConfigs;
use TheArKaID\LaravelFaspay\Debit\Rest\ApiService;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayErrorUnregisteredTransformer;

abstract class ApiServiceImpl implements ApiService {

    private $config;

    function __construct(FaspayConfigs $config) {
        $this->config = $config;
    }

    public function getConfig() {
        return $this->config;
    }

    public function sendRequestHttpPost($url, $data, $header) {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $payload = json_encode(array("user" => $data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpcode == 200) {
            $obj = json_decode($result);
            if (property_exists($obj, "response_error")) {
                if ($obj->response_error->response_code == "40") {
                    $j = new JsonDecoder(true, true);
                    $j->register(new FaspayErrorUnregisteredTransformer());
                    $fpc = $j->decode($result, UnregisteredError::class);
                    curl_close($ch);
                    return $fpc;
                }
            }
        }
        if (curl_error($ch)) {
            echo 'httpcode = ? ' . $httpcode . 'Request Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    public function sendRequestHttpPostNoHeader($url, $data) {
        return $this->sendRequestHttpPost($url, $data, Array());
    }

    public function handleErr($x) {
        if ($x instanceof UnregisteredError) {
            return $x;
        }
        return null;
    }
}
