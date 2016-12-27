<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $tickets;
    public $user;
    public $confirmation_id;
    public $user_password;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param $tickets
     * @param $confirmation_id
     * @param null $user_password
     */
    public function __construct(User $user, $tickets , $confirmation_id, $user_password = null)
    {
        $this->user = $user;
        $this->tickets = $tickets;
        $this->confirmation_id = $confirmation_id;
        $this->user_password = $user_password;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Fantasy Marketing Purchase Confirmation')
             ->to($this->user->email)
             ->view('emails.purchase_confirmation');
    }
}
