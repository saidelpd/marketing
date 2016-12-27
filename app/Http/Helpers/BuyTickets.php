<?php
/**
 * Created by PhpStorm.
 * User: Saidel
 * Date: 12/26/2016
 * Time: 10:14 AM
 */
namespace App\Http\Helpers;

use App\Mail\PurchaseConfirmation;
use App\Models\Payments;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers\Billing\StripeMethod as Billing;
use Illuminate\Support\Facades\Mail;

class BuyTickets
{
    private $raffle;
    private $request;
    private $user;
    private $payment;
    private $tickets;
    private $user_password;
    public $has_error;
    public $message;


    /**
     * BuyTickets constructor.
     * @param $raffle
     * @param $request
     */
    public function __construct($raffle, $request)
    {
        $this->raffle = $raffle;
        $this->request = $request;
        $this->has_error = false;
        $this->user_password = false;
        $this->message = '';
        $this->tickets = collect();
        $this->handle();
    }

    /**
     * Execute the job.
     * @return $this
     */
    private function handle()
    {
        if ($this->isValidStripeRequest() && $this->charge()) {

            $this->getOrCreateUser()->createTickets()
                ->sendConfirmationEmail();

            $this->payment->user_id = $this->user->id;
            $this->payment->save();
        }
        return $this;
    }

    /**
     * Validate that we get Token and Email from Stripe
     */
    private function isValidStripeRequest()
    {
        /**
         * Make sure we get Response from Stripe
         */
        if (!$this->request->stripeToken || !$this->request->stripeEmail) {
            $this->has_error = true;
            $this->message = 'Missing arguments, the charge was cancelled';
            return false;
        }
        return true;
    }

    /**
     * Charge the Credit Card And if everything Goes Well Create Tickets
     */
    private function charge()
    {
        $price = $this->raffle->ticket_cost * $this->request->checkout_quantity;
        $charge = new Billing($price, $this->request->stripeToken);
        $charge->charge();
        if ($charge->has_error) {
            $this->has_error = true;
            $this->message = $charge->error_message;
            return false;
        }
        $this->payment = new Payments();
        $this->payment->billing_id = $charge->getChargeID();
        $this->payment->raffle_id = $this->raffle->id;
        $this->payment->charge_amount = $price;
        $this->payment->fee =$charge->calculateFee();
        $this->payment->tickets_buy = $this->request->checkout_quantity;
        return true;
    }

    /**
     * If the User Already exist i will get it if not i will create a new One
     *
     */
    private function getOrCreateUser()
    {
        $this->user = User::where('email', $this->request->stripeEmail)->first();
        if (!$this->user)
        {
            /**
             * if there is no use i will create a new one
             */
            $this->user_password = HelperClass::generatePassword();
            $this->user = User::create([
                'name' => $this->request->checkout_name,
                'last_name' => $this->request->checkout_last_name,
                'email' => $this->request->stripeEmail,
                'phone' => $this->request->checkout_phone,
                'password' => Hash::make($this->user_password)
            ]);
        }
        /**
         * Save user_id on Payment
         */
        $this->payment->user_id = $this->user->id;
        $this->payment->save();
        return $this;
    }

    /**
     * Create Tickets
     */
    private function createTickets()
    {
        $ticket = [
            'user_id' => $this->user->id,
            'raffle_id' => $this->raffle->id,
            'payment_id' => $this->payment->id,
        ];
        $ids = [];
        /**
         * create a ticket per quantity buy
         */
        for ($i = 0; $i < $this->request->checkout_quantity; $i++) {
            $ticket_aux = Ticket::create($ticket);
            $ids[] = $ticket_aux->id;
        }
        $this->tickets = Ticket::find($ids);
        return $this;
    }

    /**
     * Send Confirmation Email
     */
    private function sendConfirmationEmail()
    {
       Mail::send(new PurchaseConfirmation($this->user,$this->tickets,$this->payment->billing_id,$this->user_password));
    }
}