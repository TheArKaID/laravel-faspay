<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Notify;

class FaspayTraceSuccessXMLResponse implements Sabre\Xml\XmlSerializable {

    public $response = "Payment Notification";
    public $trx_id;
    public $merchant_id;
    public $bill_no;
    public $response_code = "00";
    public $response_desc = "Success";
    public $response_date;

    function __construct($trx_id, $merchant_id, $bill_no) {
        $this->trx_id = $trx_id;
        $this->merchant_id = $merchant_id;
        $this->bill_no = $bill_no;
        $this->response_date = date("Y-m-d H:i:s");
    }

    function getResponse() {
        return $this->response;
    }

    function getTrx_id() {
        return $this->trx_id;
    }

    function getMerchant_id() {
        return $this->merchant_id;
    }

    function getBill_no() {
        return $this->bill_no;
    }

    function getResponse_code() {
        return $this->response_code;
    }

    function getResponse_desc() {
        return $this->response_desc;
    }

    function getResponse_date() {
        return $this->response_date;
    }

    function setResponse($response) {
        $this->response = $response;
    }

    function setTrx_id($trx_id) {
        $this->trx_id = $trx_id;
    }

    function setMerchant_id($merchant_id) {
        $this->merchant_id = $merchant_id;
    }

    function setBill_no($bill_no) {
        $this->bill_no = $bill_no;
    }

    function setResponse_code($response_code) {
        $this->response_code = $response_code;
    }

    function setResponse_desc($response_desc) {
        $this->response_desc = $response_desc;
    }

    function setResponse_date($response_date) {
        $this->response_date = $response_date;
    }

    public function xmlSerialize(\Sabre\Xml\Writer $writer): void {


        $writer->write([
            "response" => $this->response,
            "trx_id" => $this->trx_id,
            "merchant_id" => $this->merchant_id,
            "bill_no" => $this->bill_no,
            "response_code" => $this->response_code,
            "response_desc" => $this->response_desc,
            "response_date" => $this->response_date,
        ]);
    }

}
