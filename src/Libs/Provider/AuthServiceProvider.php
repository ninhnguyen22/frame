<?php

namespace Nin\Libs\Provider;

use Nin\Libs\Auth\AuthManager;
use Nin\Libs\Auth\AuthManagerContract;

class AuthServiceProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthManagerContract::class, AuthManager::class);
    }
}
