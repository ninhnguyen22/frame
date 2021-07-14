<?php

namespace Nin\Libs\Provider;

use Nin\Libs\View\TwigFactory;
use Nin\Libs\View\ViewConfig;
use Nin\Libs\View\ViewConfigContract;
use Nin\Libs\View\ViewFactory;

class ViewServiceProvider extends AbstractServiceProvider
{
    public $bindings = [
        ViewFactory::class => TwigFactory::class,
    ];

    public function register()
    {
        $this->app->bind(ViewConfigContract::class, function () {
            return new ViewConfig($this->app->getConfig());
        });
    }
}
