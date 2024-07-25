<?php

namespace Heydari81\Common\Responses;

class AjaxResponses
{
    public static function successResponse()
    {
        return response()->json(['message'=>'موفق شدیم'],200);
    }
    public static function failedResponse()
    {
        return response()->json(['message'=>'شکست خوردیم'],201);
    }
}
