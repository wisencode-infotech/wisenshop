<?php

namespace App\Services;

use App\Mail\OrderPlacedMail;
use App\Mail\OrderStatusChangedMail;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public $order;

    public function setRecord($order)
    {
        $this->order = $order;
    }

    public function updateStatus($status)
    {
        $this->updateFranchiseCommision($status);

        $this->order->status = $status;

        $this->order->save();

        $this->sendStatusChangedEmail();
    }

    public function placeOrder($order)
    {
        $this->setRecord($order);

        $product_service = new ProductService();
        $product_service->updateStock($order);

        $this->sendOrderPlacedEmail();

        $data = [
            'title' => 'Order Placed',
            'message' => 'Your order #' . $order->id . ' has been placed successfully.',
            'user_id' => $order->user->id,
            'is_global' => false,
            'type' => 'order',
            'url' => route('frontend.orders.details', $order->id),
            'meta_data' => [
                'order_id' => $order->id,
                'total' => $order->total_price,
                'extra_info' => $order->extra_information,
            ],
            'is_read' => false
        ];

        __addNotification($data);
    }

    protected function sendOrderPlacedEmail()
    {
        // Send order placed email to the customer
        if ( !empty($this->order->customer) )
            Mail::to($this->order->customer_contact_email)->queue(new OrderPlacedMail($this->order));
    }

    protected function sendStatusChangedEmail()
    {
        // Send email notification for order status change
        if ( !empty($this->order->customer) )
            Mail::to($this->order->customer_contact_email)->queue(new OrderStatusChangedMail($this->order));
    }

    public function saveOrderTransaction($transaction_id, $status) {
        $transaction = new Transaction();
        $transaction->order_id = $this->order->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->amount = $this->order->total_price;
        $transaction->status = $status;
        $transaction->save();
    }

    public function updateFranchiseCommision($status) {
        
        $order_detail = $this->order;

        $user = $order_detail->user;

        if(!empty($user->referral_code)){

            $reffral_user = User::where('affiliate_code', $user->referral_code)->first();

            if(!empty($reffral_user)){

                $reffral_commision = $reffral_user->commission;

                $commision = $order_detail->total_price * $reffral_commision / 100;

                if($order_detail->status == 4 && $status != 4){
                    $total_credit = $reffral_user->credit - $commision;
                    $reffral_user->credit = $total_credit;
                    $reffral_user->save();
                }

                if ($status == 4) {
                    $total_credit = $reffral_user->credit + $commision;
                    $reffral_user->credit = $total_credit;
                    $reffral_user->save();
                } 
                
            }
            
        }
    }
}
