<?php

namespace App\Services;

use App\Models\UserPaymentAccount;

class PaymentAccountService {
    public function storeUserPaymentAccount($accountInfo = []){
        $isDefaultPayment = UserPaymentAccount::where(['user_id'=>auth()->user()->id])->count() > 0 ? 0 : 1;
        
        return UserPaymentAccount::create([
            'user_id'=>auth()->user()->id,
            'account_id' => $accountInfo['account_id'],
            'account_type'=>$accountInfo['account_type'],
            'is_default'=>$isDefaultPayment,
        ]);
    }
}