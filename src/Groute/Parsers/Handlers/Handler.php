<?php
namespace Groute\Parsers\Handlers;

interface Handler 
{
    /**
     * Transforms the user inputed handler information into the internally used handler information
     * using $config
     * @param array $handler the user inputed hander information.
     * @param array $config the configuration (like default values, etc).
     * @return array the tranlated version used for execution.
     */
    public static function translate($handler, $config = []);
}