<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP\Tests;

use Ankurk91\LaravelOTP\OTPFactory;

class HelperTest extends TestCase
{
    public function test_it_return_the_otp_instance()
    {
        $otp = otp();

        $this->assertInstanceOf(OTPFactory::class, $otp);
    }
}
