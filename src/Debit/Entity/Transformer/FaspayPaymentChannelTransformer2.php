<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Transformer;

use Karriere\JsonDecoder\Transformer;
use \Karriere\JsonDecoder\ClassBindings;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannelResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannel;

class FaspayPaymentChannelTransformer2 implements Transformer {

    public function register(ClassBindings $classBindings) {
        
    }

    public function transforms(): string {
        return FaspayPaymentChannel::class;
    }

}
