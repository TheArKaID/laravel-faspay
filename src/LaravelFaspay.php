<?php

namespace TheArKaID\LaravelFaspay;

use \stdClass;
use TheArKaID\LaravelFaspay\User;
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
        if(config('faspay.isdev')){
            $this->config = new ConfigsDev(new User(config('faspay.isdev')));
        } else{
            $this->config = new ConfigsProd(new User(config('faspay.isdev')));
        } 
        return $this->config;
    }

    public function getPaymentChannel()
    {
        $service = new FaspayServiceImpl($this->getConfig());

        // Ambil Payment Channel
        $pcresp = $service->inqueryPaymentChannel()->getPayment_channel();
        // Ini untuk menampung Payment Channel nya
        $allpaymentchannel = array();
        // Ulang"
        foreach ($pcresp as $pc) {
            // Masukkan ke array
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
        
        // Buta Payment Channel
        $PC = new FaspayPaymentChannel();
        $PC->setPg_code($paymentChannel['pg_code']);
        $PC->setPg_name($paymentChannel['pg_name']);

        // Buat Pembayaran
        $item = Array();
        foreach ($orders as $order) {
            $dataorder = new FaspayPayment(
                $order["product"], // Product
                $order["qty"], // Quantity
                $order["amount"]."00", // Amount
                $order["paymentplan"], // Rencana Pembayaran
                $order["merchantid"], // Merchant ID
                $order["tenor"] // Tenor
            );
            array_push($item, $dataorder); // Push
        }
        
        // Create Billing Data
        $BillData = FaspayPaymentRequestBillData::managed(
            $billData["billno"], // Billing Number
            $billData["billdesc"], // Billing Description
            $billData["billexp"], // Waktu expired (dalam jumlah hari)
            $billData["billtotal"]."00", // Bill Total
            $item, // Item
            $billData["paytype"] // Tipe Pembayaran
        );

        $UserData = new FaspayPaymentRequestUserData(
            $userData["phone"], // Phone Number
            $userData["email"], // Email
            $userData["terminal"], // Terminal (digunakan lewat platform apa)
            $userData["custno"], // Customer Number
            $userData["custname"] // Customer Nama
        );

        // Buat Shipping Data object
        $shippingBillData = new FaspayPaymentRequestShippingData();

        // Buat Billing
        $requestPaymentWrapper = new FaspayPaymentRequestWrapper(
            $this->getConfig(), 
            $BillData, // FaspayPaymentRequestBillData
            $PC, // FaspayPaymentChannel
            $UserData, // FaspayPaymentRequestUserData
            $shippingBillData // FaspayPaymentRequestShippingData
        );

        return json_encode($service->createBilling($requestPaymentWrapper));
    }

    public function checkPaymentStatus($trx_id, $billno, $reqdesc)
    {
        $service = new FaspayServiceImpl($this->getConfig());

        echo json_encode($service->inqueryPaymentStatus(new FaspayPaymentStatusRequestWrapper(
            $reqdesc, // Keterangan Request
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
        return json_decode(file_get_contents('php://input')); // Return the JSON Data from Faspay
    }

    public function notifierXML()
    {
        $notif = new NotifyHandler();
        return $notif->handle(); // Return the XML Data
    }
}