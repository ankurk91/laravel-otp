<?php

declare(strict_types=1);

namespace Ankurk91\LaravelOTP\Tests;

use Ankurk91\LaravelOTP\OTPServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            OTPServiceProvider::class,
        ];
    }
}
