<?php

namespace app\controllers;

class HelpersController
{
    public static function clientIp(array $server): string
    {
        foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'] as $k) {
            if (! empty($server[$k])) {
                return trim(explode(',', (string)$server[$k])[0]);
            }
        }
        return '0.0.0.0';
    }
}
