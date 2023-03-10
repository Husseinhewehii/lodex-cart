<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOrderClientMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var Order
     */
    public $order;
    public $user;
    public $orderDeliveryFee;
    public $orderDeliveryCost;

    public function __construct(Order $order, User $user,$orderDeliveryFee, $orderDeliveryCost)
    {
        $this->order = $order;
        $this->user = $user;
        $this->orderDeliveryFee = $orderDeliveryFee;
        $this->orderDeliveryCost = $orderDeliveryCost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->subject(trans('order_submitted'))->view('mails.client_new_order_'.\App::getLocale());
        return $this->subject(trans('order_submitted'))->view('mails.client_new_order');
    }
}
