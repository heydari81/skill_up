<?php

namespace Heydari81\Payment\Services;

use Heydari81\Payment\Gateways\Gateway;
use Heydari81\Payment\Models\Payment;
use Heydari81\Payment\Repositories\PaymentRepo;
use Heydari81\User\Models\User;
use Heydari81\User\Repositories\UserRepo;

class PaymentService
{
    public static function generate($paymentable, $buyerId)
    {
        $buyer = User::all()->find($buyerId);
        $gateway = resolve(Gateway::class);
        $amount = $paymentable->price;
        $invoice_id = $gateway->request($amount,$paymentable->name);
        if(is_array($invoice_id)){
            return 'خطا';
        }
        if ($amount <= 0 || is_null($paymentable->id) || is_null($buyer->id)) {
            return false;
        }
        if (!is_null($paymentable->percent)) {
            $seller_p = $paymentable->percent;
            $seller_share = $amount / 100 * $seller_p;
            $site_share = $amount - $seller_share;
        } else {
            $seller_p = 0;
            $seller_share = 0;
            $site_share = 0;
        }
        $data["buyer_id" ]= $buyer->id;
        $data["amount" ]= $paymentable->price;
        $data["paymentable_type"]=get_class($paymentable);
        $data["paymentable_id"]=$paymentable->id;
        $data["invoice_id"]=$invoice_id;
        $data["status"] = "pending";
        $data["gateway"] = "zarinpal";
        $data["seller_p"] = is_null($paymentable->percent) ? 0 : $paymentable->percent;
        $data["seller_share"] = $seller_share;
        $data["site_share"]= $site_share;
        return resolve(PaymentRepo::class)->store($data);
    }
}
