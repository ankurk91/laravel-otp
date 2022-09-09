<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP;

/**
 * @source https://stackoverflow.com/questions/4356289
 */
class RandomString
{
    public static function generate(int $length = 6, string $keyspace = null): string
    {
        if (!$keyspace) {
            $keyspace = Keyspace::uppercaseLetters();
        }

        if ($length < 1) {
            throw new \RangeException('Length must be a positive integer.');
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;

        for ($i = 0; $i < $length; $i++) {
            $index = random_int(0, $max);
            $pieces[] = $keyspace[$index];
        }

        return implode('', $pieces);
    }

    public static function digits(int $length): string
    {
        return static::generate($length, Keyspace::numbers());
    }
}
