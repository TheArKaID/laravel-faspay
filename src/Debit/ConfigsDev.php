<?php

namespace TheArKaID\LaravelFaspay\Debit;

use TheArKaID\LaravelFaspay\Debit\FaspayConfigs;

class ConfigsDev extends FaspayConfigs {

    public function getCancelTransactionUrl() {
        return "https://dev.faspay.co.id/cvr/100005/10";
    }

    public function getCreateBillingUrl() {
        return "https://dev.faspay.co.id/cvr/300011/10";
    }

    public function getInquiryPaymentStatusUrl() {
        return "https://dev.faspay.co.id/cvr/100004/10";
    }

    public function getPaymentChannelUrl() {
        return "https://dev.faspay.co.id/cvr/100001/10";
    }

}
