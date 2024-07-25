<?php

namespace Heydari81\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Heydari81\Payment\Events\SuccessPayment;
use Heydari81\Payment\Gateways\Gateway;
use Heydari81\Payment\Models\Payment;
use Heydari81\Payment\Repositories\PaymentRepo;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {
        $gateway = resolve(Gateway::class);
        $paymentRepo = new PaymentRepo();
        $payment = $paymentRepo->findByInvoiceId($gateway->getInvoiceIdFromRequest($request));
        if (!$payment) {
            return redirect('/');
        }
        $result = $gateway->verify($payment);
        if (is_array($result)) {
            $paymentRepo->changeStatus($payment->id, "fail");
            //return $result["massage"];
        } else {
            // to do
            event(new SuccessPayment($payment));
            $paymentRepo->changeStatus($payment->id, "success");

        }
        return redirect()->to($payment->paymentable->path());

    }

    public function list()
    {
        $payments = Payment::all();
        return view('Payments::index',compact('payments'));
    }


}
