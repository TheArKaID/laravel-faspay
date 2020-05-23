<?php

namespace TheArKaID\LaravelFaspay\Debit\Rest;

interface UnregisteredErrorCallback {
    public function onUserNotRegistered(UnregisteredError  $mUnregisteredError);
}
