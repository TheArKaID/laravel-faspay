<?php

namespace TheArKaID\LaravelFaspay\Debit\Rest;

interface ApiService {
    function sendRequestHttpPost($url, $params, $headers);
}
