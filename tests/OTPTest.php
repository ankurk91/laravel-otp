<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP\Tests;

use Ankurk91\LaravelOTP\Facades\OTP;
use Ankurk91\LaravelOTP\OTPFactory;
use Illuminate\Support\Facades\Cache;

class OTPTest extends TestCase
{
    public function test_it_generate_secret()
    {
        $otp = app(OTPFactory::class);

        $secret = $otp->generate("test@example.com");

        $this->assertTrue($otp->match($secret, "test@example.com"));
        $this->assertFalse($otp->match("random", "test@example.com"));

        $otp->forget("test@example.com");
        $this->assertFalse($otp->match($secret, "test@example.com"));
    }

    public function test_it_allows_dynamic_configurations()
    {
        $otp = OTP::setExpiry(60);

        $this->assertSame(60, $otp->getExpiry());
        $this->assertSame(1, $otp->getExpiryInMinutes());
        $this->assertSame(6, $otp->getLength());

        $otp->setLength(8);
        $this->assertSame(8, $otp->getLength());
    }
}
