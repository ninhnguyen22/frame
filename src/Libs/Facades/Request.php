<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Request\RequestContract;

/**
 * Class Log facade
 * @package Nin\Libs\Facades
 */
class Request extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return RequestContract::class;
    }
}
