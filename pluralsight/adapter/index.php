<?php

//Target / Client
interface Share
{
    //request
    public function shareData();
}

//Adaptee/Service
class WhatsAppShare
{
    //special request
    public function wappShare(string $string)
    {
        echo "Share data via WhatsApp: ' $string '<br>";
    }
}

//Adapter
class WhatsAppShareAdapter implements Share
{

    private $whatsapp;

    private $data;

    public function __construct(WhatsAppShare $whatsapp, string $data)
    {
        $this->whatsapp = $whatsapp;
        $this->data     = $data;
    }

    //this method translate the code to our service
    public function shareData()
    {
        $this->whatsapp->wappShare($this->data);
    }
}

function clientCode(Share $share) {
    $share->shareData();
}

$wa = new WhatsAppShare();
$waShare = new WhatsAppShareAdapter($wa, 'Hello WhatsApp');
clientCode($waShare);