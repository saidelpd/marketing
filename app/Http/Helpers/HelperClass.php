<?php
namespace App\Http\Helpers;


abstract class HelperClass
{

    /**
     * Return values as us dollar currency
     * @param $number
     * @param bool $dollar_coma
     * @return string
     */
    public static function currency($number, $dollar_coma = true)
    {
        /**
         * number always will came in cents format
         */
        $number = ($number && is_numeric($number)) ? $number/100 : 0;
        if ($dollar_coma) {
            // example $ 10,000.00
            return '$ '.number_format($number,2);
        }
        // example 10000.00
        return '$ '.$number;
    }

}