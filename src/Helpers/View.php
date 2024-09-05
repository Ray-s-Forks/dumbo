<?php

namespace Dumbo\Helpers;

use Closure;

class View
{
    public static $engine;

    public static function driver(Closure $function)
    {
        return static::$engine = $function;
    }

    public static function view(...$params)
    {
        return call_user_func(static::$engine, ...$params);
    }
}
