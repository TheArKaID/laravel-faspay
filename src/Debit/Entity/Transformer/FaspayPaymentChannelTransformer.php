<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Transformer;

use Karriere\JsonDecoder\Transformer;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Bindings\ArrayBinding;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannelResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannel;

class FaspayPaymentChannelTransformer implements Transformer {

    public function register(ClassBindings $classBindings) {
        $classBindings->register(new ArrayBinding("payment_channel", "payment_channel", FaspayPaymentChannel::class));
    }

    public function transforms(): string {
        return FaspayPaymentChannelResponse::class;
    }

}
