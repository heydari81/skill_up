<?php

namespace Heydari81\Payment\Repositories;

use Heydari81\Payment\Models\Payment;

class PaymentRepo
{
    public function store($data)
    {
        $payment = new Payment();
        $payment->buyer_id = $data["buyer_id"];
        $payment->amount = $data["amount"];
        $payment->paymentable_type = $data["paymentable_type"];
        $payment->paymentable_id = $data["paymentable_id"];
        $payment->invoice_id = $data["invoice_id"];
        $payment->status = $data["status"];
        $payment->gateway = $data["gateway"];
        $payment->seller_p = $data["seller_p"];
        $payment->seller_share = $data["seller_share"];
        $payment->site_share = $data["site_share"];
        $payment->save();
        return $payment;
    }

    public function findByInvoiceId($invoiceId)
    {
        return Payment::where('invoice_id',$invoiceId)->first();
    }

    public function changeStatus($id,$status)
    {
        return Payment::where("id",$id)->update([
            "status" => $status
        ]);
    }
}
