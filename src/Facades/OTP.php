<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP\Facades;

use Ankurk91\LaravelOTP\OTPFactory;
use Illuminate\Support\Facades\Facade;

class OTP extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return OTPFactory::class;
    }
}
