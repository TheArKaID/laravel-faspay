<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Notify;

use Sabre\Xml\Writer;
use Sabre\Xml\Reader;
use Sabre\Xml\Service;
use Sabre\Xml\XmlSerializable;
use Sabre\Xml\XmlDeserializable;
use TheArKaID\LaravelFaspay\Debit\Entity\Notify\FaspayXMLResponse;
use TheArKaID\LaravelFaspay\Debit\Entity\Notify\FaspayTraceSuccessXMLResponse;

class NotifyHandler {

    function handle() {
        $raw = file_get_contents('php://input');

        $service = new Service();
        $service->elementMap = [
            "faspay" => FaspayXMLResponse::class
        ];

        $d = $service->parse($raw);
        $r = new FaspayTraceSuccessXMLResponse($d->trx_id, $d->merchant_id, $d->bill_no);
        $service->classMap = [
            "faspay" => FaspayTraceSuccessXMLResponse::class
        ];

        return $service->write("faspay", $r);
    }

}

class Q implements XmlSerializable, XmlDeserializable{

    public $title;
    public $link;
    public $id;
    public $updated;
    public $summary;

    function xmlSerialize(Writer $writer) {
        $ns = '';

        $writer->write([
            $ns . 'title' => $this->title,
                [
                'name' => $ns . 'link',
                'attributes' => ['href' => $this->link]
            ],
            $ns . 'updated' => $this->updated,
            $ns . 'id' => 'urn:uuid:1225c695-cfb8-4ebb-aaaa-80da344efa6a',
            $ns . 'summary' => 'Some text.'
        ]);
    }

    public static function xmlDeserialize(Reader $reader) {
        echo "deser";
        $object = new Q();
        $keyValue = Deserializer\keyValue($reader);
        if (isset($keyValue['a'])) {
            $object->a = $keyValue['a'];
        }
        return $object;
    }
}
