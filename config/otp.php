<?php

return [
    /**
     * Number of digits.
     */
    'length' => (int) env('OTP_LENGTH', 6),

    /**
     * Expiry in seconds.
     */
    'expiry' => (int) env('OTP_EXPIRY', 900),
];
