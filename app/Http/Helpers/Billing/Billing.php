<?php
/**
 * Created by PhpStorm.
 * User: Saidel
 * Date: 12/26/2016
 * Time: 11:26 AM
 */

namespace App\Http\Helpers\Billing;


interface Billing
{
   /**
    * Charge Credit Card
    * @return mixed
    */
   public function charge();
}