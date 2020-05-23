<?php

namespace TheArKaID\LaravelFaspay\Debit;

use TheArKaID\LaravelFaspay\Debit\FaspayConfigs;

class ConfigsProd extends FaspayConfigs {
      
    public function getCancelTransactionUrl() {
        return "https://web.faspay.co.id/cvr/100005/10";
    }

    public function getCreateBillingUrl() {
        return "https://web.faspay.co.id/cvr/300011/10";
    }

    public function getInquiryPaymentStatusUrl() {
        return "https://web.faspay.co.id/cvr/100004/10";
    }

    public function getPaymentChannelUrl() {
        return "https://web.faspay.co.id/cvr/100001/10";
    }

}
