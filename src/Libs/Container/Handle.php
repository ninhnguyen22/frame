<?php

namespace Nin\Libs\Container;

use Nin\Libs\Exceptions\ExceptionHandleContract;
use Nin\Libs\Routing\RouterContract;
use Throwable;
use Nin\Libs\Controller\Dispatcher;

/**
 * Trait Application Handle
 * @package Nin\Libs\Container
 */
trait Handle
{
    public function handle()
    {
        try {
            // Load
            $route = $this->make(RouterContract::class);
            $parameters = $this->getRouteParameters($route);

            (new Dispatcher())
                ->detect($parameters)
                ->dispatch($this);

            exit();
        } catch (Throwable $e) {
            $handle = $this->make(ExceptionHandleContract::class);
            $this->reportException($handle, $e);

            $this->renderException($handle, $e);
        }
    }

    protected function getRouteParameters(RouterContract $route)
    {
        return $route->getParameters();
    }

    protected function reportException(ExceptionHandleContract $handle, Throwable $e)
    {
        $handle->report($e);
    }

    protected function renderException(ExceptionHandleContract $handle, Throwable $e)
    {
        $handle->render($e);
    }
}
