<?php

namespace Nin\Libs\Provider;

use Nin\Libs\Session\Session;
use Nin\Libs\Session\SessionContract;

class SessionServiceProvider extends AbstractServiceProvider
{
    public $bindings = [
        SessionContract::class => Session::class,
    ];
}
