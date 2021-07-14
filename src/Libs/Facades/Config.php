<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Config\ConfigContract;

/**
 * Class Config facade
 * @package Nin\Libs\Facades
 */
class Config extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ConfigContract::class;
    }
}
