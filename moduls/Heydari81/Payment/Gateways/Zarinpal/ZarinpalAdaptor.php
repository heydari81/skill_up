<?php

namespace Heydari81\Payment\Gateways\Zarinpal;

use Heydari81\Payment\Contracts\GatewayContract;
use Heydari81\Payment\Models\Payment;
use Heydari81\Payment\Repositories\PaymentRepo;
use Illuminate\Http\Request;

class ZarinpalAdaptor implements GatewayContract
{
private $url;
private $client;
    public function request($amount, $description)
    {
        $merchant_id = "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
        $this->client = new Zarinpal();
        $callback = route('payments.callback');
        $result = $this->client->request($merchant_id,$amount, $description, "", "", $callback,true);
        if (isset($result["Status"]) && $result["Status"] == 100) {
            $this->url = $result['StartPay'];
            return $result["Authority"];
        } else {
            return ["status" => $result["Status"], "message" => $result["Message"]];
        }
    }

    public function verify(Payment $payment)
    {
        $merchant_id = "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
        $this->client = new Zarinpal();
        $result = $this->client->verify($merchant_id,$payment->amount,true);
        if (isset($result["Status"]) && $result["Status"] == 100)
        {
            return $result["RefID"];

        } else {
            return ["status"=>$result["Status"],"massage"=>$result["Message"]];
        }

    }

    public function redirect()
    {
        $this->client->redirect($this->url);
    }

    public function getInvoiceIdFromRequest(Request $request)
    {
        return $request->Authority;
    }
}
