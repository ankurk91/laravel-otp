# Laravel OTP

[![Packagist](https://badgen.net/packagist/v/ankurk91/laravel-otp)](https://packagist.org/packages/ankurk91/laravel-otp)
[![GitHub-tag](https://badgen.net/github/tag/ankurk91/laravel-otp)](https://github.com/ankurk91/laravel-otp/releases)
[![License](https://badgen.net/packagist/license/ankurk91/laravel-otp)](LICENSE.txt)
[![Downloads](https://badgen.net/packagist/dt/ankurk91/laravel-otp)](https://packagist.org/packages/ankurk91/laravel-otp/stats)
[![GH-Actions](https://github.com/ankurk91/laravel-otp/workflows/tests/badge.svg)](https://github.com/ankurk91/laravel-otp/actions)
[![codecov](https://codecov.io/gh/ankurk91/laravel-otp/branch/main/graph/badge.svg)](https://codecov.io/gh/ankurk91/laravel-otp)

One time password (OTP) generator and verifier.

## Installation

You can install the package via composer:

```bash
composer require "ankurk91/laravel-otp"
```

#### Publish the config file (optional)

You can publish the [config](./config/otp.php) file into your project.

```bash
php artisan vendor:publish --provider="Ankurk91\LaravelOTP\OTPServiceProvider" --tag="config"
```

## Usage

You can use the global helper function

```php
<?php
$phoneNumber = '+1234567890';

$secret = otp()->generate($phoneNumber, 6)
// You send $secret via SMS/Email to user

otp()->match($phoneNumber, $code);

otp()->forget($phoneNumber);
```

or you can use Facade

```php
<?php
use Ankurk91\LaravelOTP\Facades\OTP;

$secret = OTP::generate($phoneNumber)
```

> **Note**
> The OTP will be stored in default cache storage.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

```bash
composer test
```

## Security

If you discover any security issues, please email `pro.ankurk1[at]gmail[dot]com` instead of using the issue tracker.

## License

The [MIT](https://opensource.org/licenses/MIT) License.
