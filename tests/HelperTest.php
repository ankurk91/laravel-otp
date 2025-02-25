<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP\Tests;

use Ankurk91\LaravelOTP\OTPFactory;
use Ankurk91\LaravelOTP\OTPServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;

#[CoversClass(OTPFactory::class)]
#[CoversClass(OTPServiceProvider::class)]
#[CoversMethod("", "otp")]
class HelperTest extends TestCase
{
    public function test_it_return_the_otp_instance()
    {
        $otp = otp();

        $this->assertInstanceOf(OTPFactory::class, $otp);
    }
}
