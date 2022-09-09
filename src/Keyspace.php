<?php
declare(strict_types=1);

namespace Ankurk91\LaravelOTP;

class Keyspace
{
    public static function uppercaseLetters(): string
    {
        return static::build('A', 'Z');
    }

    public static function numbers(): string
    {
        return static::build(0, 9);
    }

    protected static function build($start, $end): string
    {
        return array_reduce(
            range($start, $end),
            fn($p, $n) => $p.$n
        );
    }
}
