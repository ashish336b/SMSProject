<?php


namespace App\Helper;


class Helper
{
    public static function checkActiveGuard()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }
}
