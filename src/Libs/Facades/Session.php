<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Session\SessionContract;

/**
 * Class View facade
 * @package Nin\Libs\Facades
 */
class Session extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SessionContract::class;
    }
}
