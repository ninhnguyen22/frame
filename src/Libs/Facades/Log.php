<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Logger\LoggerContract;

/**
 * Class Log facade
 * @package Nin\Libs\Facades
 */
class Log extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LoggerContract::class;
    }
}
