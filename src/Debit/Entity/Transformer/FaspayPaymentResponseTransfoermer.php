<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Transformer;

use Karriere\JsonDecoder\Transformer;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Bindings\ArrayBinding;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentResponseBillItem;

class FaspayPaymentResponseTransfoermer implements Transformer{
    
    public function register(ClassBindings $classBindings) {
        $classBindings->register(new ArrayBinding("bill_items", "bill_items", FaspayPaymentResponseBillItem::class));    
    }

    public function transforms(): string {
        return FaspayPaymentResponse::class;
    }

}
