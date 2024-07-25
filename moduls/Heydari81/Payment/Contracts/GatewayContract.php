<?php

namespace Heydari81\Payment\Contracts;

use Heydari81\Payment\Models\Payment;
use Illuminate\Http\Request;

interface GatewayContract
{
    public function request($amount,$description);

    public function verify(Payment $payment);

    public function redirect();

}
