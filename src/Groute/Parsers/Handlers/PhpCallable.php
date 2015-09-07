<?php
namespace Groute\Parsers\Handlers;

class PhpCallable implements Handler
{
    public static function translate($handler, $config = [])
    {
        if (is_callable($handler))
            return $handler;
        else
            throw new \InvalidArgumentException('PhpCallable::translate() requires the first parameter to be non-empty array and a valid callable.');
    }
}