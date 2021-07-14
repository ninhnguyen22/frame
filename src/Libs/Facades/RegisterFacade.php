<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Container\Application;

class RegisterFacade
{
    public function bootstrap(Application $app)
    {
        Facade::setFacadeApplication($app);
    }

}
