<?php

namespace TheArKaID\LaravelFaspay\Debit\Service;

use \stdClass;
use Karriere\JsonDecoder\JsonDecoder;
use TheArKaID\LaravelFaspay\Debit\FaspayUser;
use TheArKaID\LaravelFaspay\Debit\Rest\ApiServiceImpl;
use TheArKaID\LaravelFaspay\Debit\Service\FaspayService;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentRequest;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayCancelPaymentResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannel;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannelResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentStatusResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentStatusRequest;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentStatusRequestWrapper;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayCancelPaymentRequest;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\Transformer\FaspayPaymentChannelTransformer;
use TheArKaID\LaravelFaspay\Debit\Entity\Transformer\FaspayPaymentResponseTransfoermer;
use TheArKaID\LaravelFaspay\Debit\Entity\Transformer\FaspayPaymentChannelTransformer2;

class FaspayServiceImpl extends ApiServiceImpl implements FaspayService {

    public function inqueryPaymentChannel() {
        $data = new stdClass();
        $data->request = "";
        $data->merchant_id = $this->getConfig()->getUser()->getMerchantId();
        $data->merchant = $this->getConfig()->getUser()->getMerchantName();
        $data->signature = $this->getConfig()->getUser()->calculateSignature();
        $x = $this->sendRequestHttpPostNoHeader($this->getConfig()->getPaymentChannelUrl(), $data);
        $err = parent::handleErr($x);
        if($err){
            return $err;
        }
        $d = json_decode($x, true);

        $j = new JsonDecoder(true,true);
        $j->register(new FaspayPaymentChannelTransformer());
        $fpc = $j->decode($x, FaspayPaymentChannelResponse::class);

        return $fpc;
    }

    public function cancelTransaction(FaspayCancelPaymentRequest $request) {
        
        $x = $this->sendRequestHttpPostNoHeader($this->getConfig()->getCancelTransactionUrl(), $request);
        $err = parent::handleErr($x);
        if($err){
            return $err;
        }
        $j = new JsonDecoder(true,true);
        
        $fpc = $j->decode($x, FaspayCancelPaymentResponse::class);

        return $fpc;
    }

    public function createBilling(FaspayPaymentRequest $request) {
        
        $x = $this->sendRequestHttpPostNoHeader($this->getConfig()->getCreateBillingUrl(), $request);
        $err = parent::handleErr($x);
        if($err){
            return $err;
        }
        $j = new JsonDecoder(true,true);
        $j->register(new FaspayPaymentResponseTransfoermer());
        $fpc = $j->decode($x, FaspayPaymentResponse::class);

        return $fpc;
    }
    
    public function inqueryPaymentStatus(FaspayPaymentStatusRequest $request) {

        $x = $this->sendRequestHttpPostNoHeader($this->getConfig()->getInquiryPaymentStatusUrl(), $request);
        $err = parent::handleErr($x);
        if($err){
            return $err;
        }
        $j = new JsonDecoder(true,true);
        
        $fpc = $j->decode($x, FaspayPaymentStatusResponse::class);

        return $fpc;
    }
}
