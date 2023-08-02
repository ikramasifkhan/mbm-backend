<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\UserPaymentAccount;
use Illuminate\Support\Facades\Log;

class MobileRechargeService {
    public static function createSubscription($subscriptionInfo = []){
        Log::info("THis is mobile service");
        //return Subscription::create($subscriptionInfo);
    }
}