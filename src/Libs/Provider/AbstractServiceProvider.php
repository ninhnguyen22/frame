<?php

namespace Nin\Libs\Provider;

use Nin\Libs\Container\Application;

abstract class AbstractServiceProvider
{
    protected Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->boot();
    }

    public function register()
    {

    }

    public function boot()
    {
        //
    }
}
