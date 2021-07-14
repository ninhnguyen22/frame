<?php

namespace Nin\Libs\Request;

use Nin\Libs\Container\ApplicationContract;
use Symfony\Component\Routing\RequestContext;

/**
 * Class RequestContextFactory
 * @package Nin\Libs\Request
 */
class RequestContextFactory extends RequestContext implements RequestContextContract
{
    /**
     * Init
     * @param ApplicationContract $app
     */
    public function boot(ApplicationContract $app)
    {
        $request = $this->getRequest($app);
        $this->fromRequest($request);
    }

    /**
     * Get Request
     *
     * @param ApplicationContract $app
     * @return RequestContract
     */
    protected function getRequest(ApplicationContract $app): RequestContract
    {
        return $app->make(RequestContract::class);
    }
}
