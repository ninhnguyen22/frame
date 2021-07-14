<?php

namespace Nin\Libs\Provider;

use Nin\Libs\Container\ApplicationContract;

class AppServiceProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->app->bind(ApplicationContract::class, function () {
            return $this->app;
        });
    }
}
