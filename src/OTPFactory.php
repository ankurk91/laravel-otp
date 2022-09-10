<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Str;

class OTPFactory
{
    public function __construct(
        protected Repository $store,
        protected int $expireInSeconds = 900,
        protected int $length = 6
    ) {
        //
    }

    public function setLength(int $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setExpiry(int $seconds): static
    {
        $this->expireInSeconds = $seconds;

        return $this;
    }

    public function getExpiry(): int
    {
        return $this->expireInSeconds;
    }

    public function getExpiryInMinutes(): int
    {
        return (int) round($this->expireInSeconds / 60, 0);
    }

    public function generate(string $key): ?string
    {
        $secret = $this->makeSecret();

        $this->store->put($this->makeKey($key), $secret, $this->getExpiry());

        return $secret;
    }

    protected function makeSecret(): string
    {
        return RandomString::digits($this->getLength());
    }

    public function match($code, string $key): bool
    {
        if (empty($code)) {
            return false;
        }

        $cachedValue = $this->store->get($this->makeKey($key));

        if (empty($cachedValue)) {
            return false;
        }

        return $cachedValue === (string) $code;
    }

    public function forget(string $key): bool
    {
        return $this->store->forget($this->makeKey($key));
    }

    protected function makeKey(string $key): string
    {
        return (string) Str::of('otp:'.$key)->trim()->lower()->slug();
    }
}
