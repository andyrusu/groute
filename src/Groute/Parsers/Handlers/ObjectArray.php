<?php
namespace Groute\Parsers\Handlers;

class ObjectArray implements Handler
{
    public static function translate($handler, $config = [])
    {
        if (is_string($handler))
        {
            
        }
        elseif (is_array($handler))
        {
            
        }
        else
            throw new \InvalidArgumentException('ObjectArray::translate() requires the first parameter to be non-empty array or string.');
    }
}