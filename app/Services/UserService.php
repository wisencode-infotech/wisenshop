<?php

namespace App\Services;

use App\Models\User;
use App\Models\Order;

class UserService
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle franchise commission logic based on order status.
     *
     * @param Order $order
     * @param int $latest_status
     * @return void
     */
    public function handleUserCommission(Order $order, int $latest_status): void
    {
        $this->proceedCommission($order, $latest_status);

        $franchise = User::where('affiliate_code', $this->user->referral_code)->first();

        if ($franchise)
            $this->proceedCommission($order, $latest_status, $franchise);
    }

    private function proceedCommission(Order $order, int $latest_status, User $user = null): void
    {
        $user = (!empty($user)) ? $user : $this->user;

        $commission_rate = $user->commission;

        $commission_amount = ($order->total_price * $commission_rate) / 100;

        $status = config('general.order_statuses.' . $latest_status);

        // Deduct credit if status is updated from 4 to non-4.
        if ($order->status == 4 && $latest_status != 4) {
            $this->handleCreditChange($user, -$commission_amount, $order, $status, 'deducted');
        }

        // Add credit if status is updated to 4.
        if ($latest_status == 4) {
            $this->handleCreditChange($user, $commission_amount, $order, $status, 'added');
        }
    }

    private function handleCreditChange(User $user, float $amount, Order $order, string $status, string $action): void
    {
        $this->adjustCredit($user, $amount);

        $notificationData = [
            'title' => abs($amount) . ' ' . $action . ' to your credit score.',
            'message' => abs($amount) . ' ' . $action . ' to your credit score. Order #' . $order->id . ' is ' . $status,
            'user_id' => $user->id,
            'is_global' => false,
            'type' => 'credit',
            'url' => '',
            'meta_data' => [
                'order_id' => $order->id
            ],
            'is_read' => false
        ];

        __addNotification($notificationData);
    }

    /**
     * Adjust the credit of the given franchise user.
     *
     * @param User $franchise
     * @param float $amount
     * @return void
     */
    private function adjustCredit(User $franchise, float $amount): void
    {
        $franchise->credit += $amount;
        $franchise->save();
    }
}
