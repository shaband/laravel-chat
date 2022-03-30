<?php

namespace Abdulrahman\GenericChat\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Abdulrahman\GenericChat\GenericChat
 */
class GenericChat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'generic-chat';
    }
}
