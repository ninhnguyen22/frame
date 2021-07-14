<?php

namespace Nin\Libs\Facades;

/**
 * Class Auth
 *
 * @package Nin\Libs\Facades
 */
class Auth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Nin\Libs\Auth\AuthManagerContract::class;
    }

}
