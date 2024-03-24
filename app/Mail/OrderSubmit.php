<?php

namespace App\Mail;

use App\Models\Email;
use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSubmit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param Email $email
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $order = Order::where('user_id', auth()->user()->id)->get()->last();
        $user = User::where('email', $this->email->user_email)->first();
        return $this->view('emails.order.submit', compact('order', 'user'));
    }
}
