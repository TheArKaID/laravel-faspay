<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Notify;

class FaspayXMLResponse implements Sabre\Xml\XmlSerializable, \Sabre\Xml\XmlDeserializable {

    public $request;
    public $trx_id;
    public $merchant_id;
    public $merchant;
    public $bill_no;
    public $payment_reff;
    public $payment_date;
    public $payment_status_code;
    public $payment_status_desc;
    public $signature;

    public function xmlSerialize(\Sabre\Xml\Writer $writer): void {
        $writer->write([
            "request" => $this->request,
            "trx_id" => $this->trx_id,
            "merchant_id" => $this->merchant_id,
            "merchant" => $this->merchant,
            "bill_no" => $this->bill_no,
            "payment_reff" => $this->payment_reff,
            "payment_date" => $this->payment_date,
            "payment_status_code" => $this->payment_status_code,
            "payment_status_desc" => $this->payment_status_desc,
            "signature" => $this->signature,
        ]);
    }

    public static function xmlDeserialize(\Sabre\Xml\Reader $reader) {
        $object = new FaspayXMLResponse();
        $keyValue = \Sabre\Xml\Deserializer\keyValue($reader);
        
        if (isset($keyValue["{}request"])) {
            $object->request = $keyValue['{}request'];
        }
        if (isset($keyValue["{}trx_id"])) {
            $object->trx_id = $keyValue['{}trx_id'];
        }
        if (isset($keyValue["{}merchant_id"])) {
            $object->merchant_id = $keyValue['{}merchant_id'];
        }
        if (isset($keyValue["{}merchant"])) {
            $object->merchant = $keyValue['{}merchant'];
        }
        if (isset($keyValue["{}bill_no"])) {
            $object->bill_no = $keyValue['{}bill_no'];
        }
        if (isset($keyValue["{}payment_reff"])) {
            $object->payment_reff = $keyValue['{}payment_reff'];
        }
        
        if (isset($keyValue["{}payment_date"])) {
            $object->payment_date = $keyValue['{}payment_date'];
        }
        if (isset($keyValue["{}payment_status_code"])) {
            $object->payment_status_code = $keyValue['{}payment_status_code'];
        }
        if (isset($keyValue["{}payment_status_desc"])) {
            $object->payment_status_desc = $keyValue['{}payment_status_desc'];
        }
        if (isset($keyValue["{}signature"])) {
            $object->signature = $keyValue['{}signature'];
        }
        return $object;
    }

}
