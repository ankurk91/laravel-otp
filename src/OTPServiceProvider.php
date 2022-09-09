<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class OTPServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/otp.php' => config_path('otp.php'),
            ], 'config');
        }

        $this->app->scoped(OTPFactory::class, function (Container $app) {
            ['length' => $length, 'expiry' => $expiry] = $app['config']->get('otp');

            return new OTPFactory($app['cache.store'], $expiry, $length);
        });
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/otp.php', 'otp');
    }
}
