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

    /**
     * Generates a strong password of N length containing at least one lower case letter,
     * one uppercase letter, one digit, and one special character. The remaining characters
     * in the password are chosen at random from those four sets.
     * The available characters in each set are user friendly - there are no ambiguous
     * characters such as i, l, 1, o, 0, etc. This, coupled with the $add_dashes option,
     * makes it much easier for users to manually type or speak their passwords.
     * Note: the $add_dashes option will increase the length of the password by
     * floor(sqrt(N)) characters.
     * @param int $length
     * @param bool $add_dashes
     * @param string $available_sets
     * @return string
     */
    public static  function generatePassword($length = 9, $add_dashes = false, $available_sets = 'luds')
    {
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if(!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }


    /**
     * US States
     * @return array
     */
    public static function usStates($acronym = false)
    {
        return ['AL' => 'Alabama'.($acronym?' (AL)':''),
            'AK' => 'Alaska'.($acronym?' (AK)':''),
            'AZ' => 'Arizona'.($acronym?' (AZ)':''),
            'AR' => 'Arkansas'.($acronym?' (AR)':''),
            'CA' => 'California'.($acronym?' (CA)':''),
            'CO' => 'Colorado'.($acronym?' (CO)':''),
            'COS' => 'Colorado Springs'.($acronym?' (COS)':''),
            'CT' => 'Connecticut'.($acronym?' (CT)':''),
            'DE' => 'Delaware'.($acronym?' (DE)':''),
            'DC' => 'District of Columbia'.($acronym?' (DC)':''),
            'FL' => 'Florida'.($acronym?' (FL)':''),
            'GA' => 'Georgia'.($acronym?' (GA)':''),
            'HI' => 'Hawaii'.($acronym?' (HI)':''),
            'ID' => 'Idaho'.($acronym?' (ID)':''),
            'IL' => 'Illinois'.($acronym?' (IL)':''),
            'IN' => 'Indiana'.($acronym?' (IN)':''),
            'IA' => 'Iowa'.($acronym?' (IA)':''),
            'KS' => 'Kansas'.($acronym?' (KS)':''),
            'KY' => 'Kentucky'.($acronym?' (KY)':''),
            'LA' => 'Louisiana'.($acronym? ' (LA)':''),
            'ME' => 'Maine'.($acronym? ' (ME)':''),
            'MD' => 'Maryland'.($acronym? ' (MD)':''),
            'MA' => 'Massachusetts'.($acronym? ' (MA)':''),
            'MI' => 'Michigan'.($acronym? ' (MI)':''),
            'MN' => 'Minnesota'.($acronym? ' (MN)':''),
            'MS' => 'Mississippi'.($acronym? ' (MS)':''),
            'MO' => 'Missouri'.($acronym? ' (MO)':''),
            'MT' => 'Montana'.($acronym? ' (MT)':''),
            'NE' => 'Nebraska'.($acronym? ' (NE)':''),
            'NV' => 'Nevada'.($acronym? ' (NV)':''),
            'NH' => 'New Hampshire'.($acronym?' (NH)':''),
            'NJ' => 'New Jersey'.($acronym?' (NJ)':''),
            'NM' => 'New Mexico'.($acronym?' (NM)':''),
            'NY' => 'New York'.($acronym?' (NY)':''),
            'NC' => 'North Carolina'.($acronym?' (NC)':''),
            'ND' => 'North Dakota'.($acronym?' (ND)':''),
            'OH' => 'Ohio'.($acronym?' (OH)':''),
            'OK' => 'Oklahoma'.($acronym?' (OK)':''),
            'OR' => 'Oregon'.($acronym?' (OR)':''),
            'PA' => 'Pennsylvania'.($acronym?' (PA)':''),
            'RI' => 'Rhode Island'.($acronym?' (RI)':''),
            'SC' => 'South Carolina'.($acronym?' (SC)':''),
            'SD' => 'South Dakota'.($acronym?' (SD)':''),
            'TN' => 'Tennessee Central'.($acronym?' (TN)':''),
            'KTN' => 'Tennessee Eastern'.($acronym?' (KTN)':''),
            'TX' => 'Texas'.($acronym?' (TX)':''),
            'UT' => 'Utah'.($acronym?' (UT)':''),
            'VT' => 'Vermont'.($acronym?' (VT)':''),
            'VA' => 'Virginia'.($acronym?' (VA)':''),
            'WA' => 'Washington'.($acronym?' (WA)':''),
            'WV' => 'West Virginia'.($acronym?' (WV)':''),
            'WI' => 'Wisconsin'.($acronym?' (WI)':''),
            'WY' => 'Wyoming'.($acronym?' (WY)':''),
        ];
    }


}