<?php

namespace App\Observers;

use App\Http\Requests\MobileRechargeRequest;
use App\Models\BankAccount;
use App\Models\CardAccount;
use App\Models\MobileRecharge;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\UserPaymentAccount;
use App\Repositories\BIllRepo;
use App\Repositories\OrderRepo;
use App\Services\MobileRechargeService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MobileRechargeObserver
{
    private $bill;
    private $order;
    private $request;

    public function __construct(MobileRechargeRequest $request, BIllRepo $bill, OrderRepo $order)
    {
        $this->bill = $bill;
        $this->order = $order;
        $this->request = $request;
    }
    /**
     * Handle the MobileRecharge "created" event.
     */
    public function created(MobileRecharge $mobileRecharge): void
    {
        //Insert bill data
        $billData = $this->request->only(['first_name', 'last_name', 'email', 'mobile', 'street_address', 'city', 'state', 'zip_code']);
        $billData['mobile_recharge_id'] = $mobileRecharge->id;
        $newBill = $this->bill->storeBill($billData);

        //Insert order data
        $orderData['mobile_recharge_id'] = $mobileRecharge->id;
        $orderData['product_id'] = $mobileRecharge->product_id;
        $orderData['transaction_id'] = Str::random(6);
        $orderData['subtotal'] = $mobileRecharge->recharge_amount;
        $orderData['fees'] = 5.00;
        $orderData['total'] = $mobileRecharge->recharge_amount + 5.00;
        //$orderData['payment_method'] = 'Google Pay';
        //$orderData['billing_info'] = 'Google Pay';
        $newOrder = $this->order->storeOrder($orderData);

        //store payment info
        if (request()->is_saved_payment_method == 1) {
            $model = request()->payment_method === 'card' ? CardAccount::class : BankAccount::class;

            $userPayment = UserPaymentAccount::where(['user_id' => request()->user()->id, 'account_id' => request()->account_id, 'account_type'=>$model])->first();
            
            Payment::create([
                'mobile_recharge_id' => $mobileRecharge->id,
                'account_id' => $userPayment->account_id,
                'payment_method' => $this->request->payment_method
            ]);
        } else {
            $cardInfo = CardAccount::create([
                'domain_id' => request()->domain_id,
                'name' => $this->request->card_name,
                'card_number' => $this->request->card_number,
                'expire_date' => $this->request->card_expire_date,
                'cvv' => $this->request->cvv
            ]);

            Payment::create([
                'mobile_recharge_id' => $mobileRecharge->id,
                'account_id' => $cardInfo->id,
                'payment_method' => $this->request->payment_method
            ]);
        }

        if(request()->user()){
            Subscription::create([
                'user_id' => request()->user()->id,
                'product_id'=> $mobileRecharge->product_id,
                'bill_id' => $newBill->id,
                'subscrtiption_number' => $mobileRecharge->mobile_number,
                'next_payment'=> $mobileRecharge->created_at->addMonth(),
                'amount'=> $newOrder->total,
                'is_autopay'=> $mobileRecharge->type === 'autopay' ? 1 : 0
            ]);
        }
        
    }

    /**
     * Handle the MobileRecharge "updated" event.
     */
    public function updated(MobileRecharge $mobileRecharge): void
    {
        //
    }

    /**
     * Handle the MobileRecharge "deleted" event.
     */
    public function deleted(MobileRecharge $mobileRecharge): void
    {
        //
    }

    /**
     * Handle the MobileRecharge "restored" event.
     */
    public function restored(MobileRecharge $mobileRecharge): void
    {
        //
    }

    /**
     * Handle the MobileRecharge "force deleted" event.
     */
    public function forceDeleted(MobileRecharge $mobileRecharge): void
    {
        //
    }
}
