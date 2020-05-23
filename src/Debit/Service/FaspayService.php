<?php

namespace TheArKaID\LaravelFaspay\Debit\Service;

use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentRequest;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayCancelPaymentRequest;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentStatusRequest;

interface FaspayService {

    public function inqueryPaymentChannel();

    public function createBilling(FaspayPaymentRequest $request);

    public function inqueryPaymentStatus(FaspayPaymentStatusRequest $request);

    public function cancelTransaction(FaspayCancelPaymentRequest $request);
}