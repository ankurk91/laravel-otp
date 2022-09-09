<?php

declare(strict_types=1);

use Ankurk91\LaravelOTP\OTPFactory;

if (!function_exists('otp')) {

    function otp(): OTPFactory
    {
        return app(OTPFactory::class);
    }

}
