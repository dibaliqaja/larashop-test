<?php

namespace App\Mail;

use App\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class OrderSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $order_summary;
    public $product_order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_summary, $product_order)
    {
        $this->order_summary = $order_summary;
        $this->product_order = $product_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $admin     = User::where('role', 'ADMIN')->first();
        $userOrder = Auth::user();

        return $this->from($admin->email, $admin->name)
                    ->to($userOrder->email, $userOrder->name)
                    ->bcc($admin->email, $admin->name)
                    ->subject('Order Summary from Larashop')
                    ->markdown('emails.order');
    }
}
