<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Container\ApplicationContract;

/**
 * Class App facacde
 *
 * @package Nin\Libs\Facades
 */
class App extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApplicationContract::class;
    }

}
