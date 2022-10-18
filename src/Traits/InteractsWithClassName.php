<?php

namespace Hillel\Traits;

trait InteractsWithClassName
{
    public static function getShortClassName(): string
    {
        return (new \ReflectionClass(self::class))->getShortName();
    }

    public static function splitClassName(): string
    {
        return preg_replace("/(?<!\A)[A-Z]+/", ' $0', self::getShortClassName());
    }
}