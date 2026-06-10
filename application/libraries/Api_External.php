<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Api_External
{

    public function generate_random_number($abn, $type)
    {
        $length = 1;
        $numberlength = 7;
        $last_abn_two_digit = substr($abn, -2);
        $randomletter = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        $randomnumber = substr(str_shuffle("0123456789"), 0, $numberlength);
        $random_id = $type . $randomletter . $last_abn_two_digit . $randomnumber;
        return $random_id;
    }
}