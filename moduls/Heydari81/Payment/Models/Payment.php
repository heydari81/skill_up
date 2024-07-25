<?php

namespace Heydari81\Payment\Models;

use Heydari81\Course\Repositories\CourseRepo;
use Heydari81\User\Models\User;
use Heydari81\User\Repositories\UserRepo;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
protected $guarded=[];
    public static $statuses = [
        "pending","canceled","success","fail"
    ];

    public function paymentable()
    {
        return $this->morphTo("paymentable");
    }
    public function buyername()
    {
        $buyername = (new UserRepo())->findById($this->buyer_id)->name;
        return $buyername;
    }
    public function courseback()
    {
        $buyername = (new CourseRepo())->findById($this->paymentable_id);
        return $buyername;
    }
}
