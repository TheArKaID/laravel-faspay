<?php

namespace TheArKaID\LaravelFaspay;

use \stdClass;
use TheArKaID\LaravelFaspay\faspay;
use TheArKaID\LaravelFaspay\Debit\ConfigsDev;
use TheArKaID\LaravelFaspay\Debit\ConfigsProd;
use TheArKaID\LaravelFaspay\Debit\Service\FaspayServiceImpl;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannel;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannelResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentStatusRequestWrapper;
use TheArKaID\LaravelFaspay\Debit\Entity\Notify\NotifyHandler;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPayment;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestBillData;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestUserData;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestWrapper;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestShippingData;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentCancelRequestWrapper;

class LaravelFaspay
{
    private $config;

    public function getConfig()
    {
        $user = new faspay();
        if($user->getDev()){
            $this->config = new ConfigsDev($user);
        } else{
            $this->config = new ConfigsProd($user);
        } 
        return $this->config;
    }

    public function getPaymentChannel()
    {
        $service = new FaspayServiceImpl($this->getConfig());

        // Get Payment Channel
        $pcresp = $service->inqueryPaymentChannel()->getPayment_channel();
        // This is for Payment Channel
        $allpaymentchannel = array();
        // Loop here
        foreach ($pcresp as $pc) {
            // Insert to array
            $allpaymentchannel[] = array(
                'pg_code' => $pc->getPg_code(), 
                'pg_name' => $pc->getPg_name()
            );
        }
        return json_encode($allpaymentchannel, JSON_PRETTY_PRINT);
    }

    public function createPayment($orders, $paymentChannel, $billData, $userData)
    {
        $service = new FaspayServiceImpl($this->getConfig());
        
        // Create Payment Channel object
        $PC = new FaspayPaymentChannel();
        $PC->setPg_code($paymentChannel['pg_code']);
        $PC->setPg_name($paymentChannel['pg_name']);

        // Create Payment with Order
        $item = Array();
        foreach ($orders as $order) {
            $dataorder = new FaspayPayment(
                $order->getProduct(), // Product
                $order->getQty(), // Quantity
                $order->getAmount(), // Amount
                $order->getPayment_plan(), // Payment Plan
                $order->getMerchant_id(), // Merchant ()ID
                $order->getTenor() // Tenor
            );
            array_push($item, $dataorder); // Push
        }
        $expired = $billData->getBill_expired();
        
        // Create Billing Data
        $BillData = FaspayPaymentRequestBillData::managed(
            $billData->getBill_no(), // Billing Number
            $billData->getBill_desc(), // Billing Description
            $expired, // Expired Day Interval
            $billData->getBill_total(), // Bill Total
            $item, // Item
            $billData->getPay_type() // Pay Type
        );

        $UserData = new FaspayPaymentRequestUserData(
            $userData->getMsisdn(), // MSIDN
            $userData->getEmail(), // Email
            $userData->getTerminal(), // Terminal
            $userData->getCustNo(), // Customer No
            $userData->getCustName() // Customer Name
        );

        // Create Shipping Data object
        $shippingBillData = new FaspayPaymentRequestShippingData();

        // Wrap and Create Billing
        $requestPaymentWrapper = new FaspayPaymentRequestWrapper(
            $this->getConfig(), 
            $BillData, // FaspayPaymentRequestBillData
            $PC, // FaspayPaymentChannel
            $UserData, // FaspayPaymentRequestUserData
            $shippingBillData // FaspayPaymentRequestShippingData
        );

        return json_encode($service->createBilling($requestPaymentWrapper));
    }

    public function checkPaymentStatus($trx_id, $billno)
    {
        $service = new FaspayServiceImpl($this->getConfig());

        echo json_encode($service->inqueryPaymentStatus(new FaspayPaymentStatusRequestWrapper(
            "Status Pembayaran", // Request Description
            $trx_id, // Transaction ID
            $billno, // Nomor Orderan
            $this->getConfig()
        )));
    }

    public function cancelPayment($trx_id, $billno, $paymentcancel)
    {
        $service = new FaspayServiceImpl($this->getConfig());

        echo json_encode($service->cancelTransaction(new FaspayPaymentCancelRequestWrapper(
            $trx_id, // Transaction ID
            $billno, // Nomor Orderan
            $paymentcancel, // Alasan Pembatalan
            $this->getConfig()
        )));
    }

    public function notifier()
    {
        $notif = new NotifyHandler();
        return $notif->handle();
    }
}