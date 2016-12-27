<?php
namespace App\Http\Helpers\Billing;

use Stripe\Error\Card;
use Stripe\Stripe;
use Stripe\Charge;

/**
 * Created by PhpStorm.
 * User: Saidel
 * Date: 12/26/2016
 * Time: 11:19 AM
 */
class StripeMethod implements Billing
{
    private $key;
    private $token;
    private $price;
    public $response;
    public $has_error;
    public $error_message;

    /**
     * Stripe constructor.
     * @param $price
     * @param $token
     */
    public function __construct($price, $token)
    {
       $this->token = $token;
        $this->price = $price;
        $this->has_error = false;
        $this->key = config('services.stripe.secret');
    }

    /**
     * Charge Credit Card
     * @return mixed
     */
    public function charge()
    {
        Stripe::setApiKey($this->key);
        try{
           $this->response = Charge::create([
                 "amount" => $this->price,
                 "source" => $this->token,
                 "currency" => "usd",
                 "description" => "Ticket Purchase"
            ]);


        }
        catch(Card $ex)
        {
          $this->has_error = true;
          $this->error_message =  $ex->getMessage();
        }
        catch(\Exception $ex)
        {
            $this->has_error = true;
            $this->error_message =  $ex->getMessage();
        }
    }

    /**
     * return stripe Fee
     */
    public function calculateFee()
    {
     return ($this->price*2.9)/100 + 30;
    }

    /**
     * return Charge ID
     * @return mixed
     */
    public function getChargeID()
    {
        return $this->response->id;
    }
}