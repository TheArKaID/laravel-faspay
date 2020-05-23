<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Transformer;

use Karriere\JsonDecoder\Transformer;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Bindings\FieldBinding;
use TheArKaID\LaravelFaspay\Debit\Entity\Err\UnregisteredError;
use TheArKaID\LaravelFaspay\Debit\Entity\Err\UnregisteredErrorDef;

class FaspayErrorUnregisteredTransformer implements Transformer {

    public function register(ClassBindings $classBindings) {
        $classBindings->register(new FieldBinding("response_error", "response_error", UnregisteredErrorDef::class));
    }

    public function transforms(): string {
        return UnregisteredError::class;
    }

}
