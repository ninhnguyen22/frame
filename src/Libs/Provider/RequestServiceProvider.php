<?php

namespace Nin\Libs\Provider;

use Nin\Libs\Request\RequestContextContract;
use Nin\Libs\Request\RequestContextFactory;
use Nin\Libs\Request\RequestContract;
use Nin\Libs\Request\RequestFactory;

/**
 * Class RequestServiceProvider
 * @package Nin\Libs\Provider
 */
class RequestServiceProvider extends AbstractServiceProvider
{
    public $bindings = [
    ];

    public function register()
    {
        $this->app->bind(RequestContract::class, function () {
            $requestContext = new RequestFactory();
            return $requestContext->boot();
        });

        $this->app->bind(RequestContextContract::class, function () {
            $requestContext = new RequestContextFactory();
            $requestContext->boot($this->app);
            return $requestContext;
        });
    }
}
