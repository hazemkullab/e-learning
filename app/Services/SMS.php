<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SMS {

    public static function send($number, $msg)
    {
        Http::get('http://hotsms.ps/sendbulksms.php', [
            'user_name' => env('SMS_USER'),
            'user_pass' => env('SMS_PASS'),
            'sender' => env('SMS_SENDER'),
            'mobile' => $number,
            'type' => 2,
            'text' => $msg
        ]);
    }
}
