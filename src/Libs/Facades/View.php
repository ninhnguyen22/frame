<?php

namespace Nin\Libs\Facades;

use Nin\Libs\View\ViewFactory;

/**
 * Class View facade
 * @package Nin\Libs\Facades
 */
class View extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ViewFactory::class;
    }
}
