<?php

namespace Nin\Libs\Container;

use Nin\Libs\Controller\Dispatcher;
use Nin\Libs\Exceptions\ExceptionHandleContract;
use Nin\Libs\Middleware\Middleware;
use Nin\Libs\Middleware\Pipeline;
use Nin\Libs\Request\RequestContract;
use Nin\Libs\Routing\RouterContract;

/**
 * Class Kernel
 * @package Nin\Libs\Container
 */
class Kernel implements KernelContract
{
    /**
     * Middleware list
     * @var array
     */
    public array $middlewares = [];

    /**
     * @var ApplicationContract
     */
    protected ApplicationContract $app;

    public function __construct(ApplicationContract $app)
    {
        $this->app = $app;
    }

    /**
     * Kernel handle
     */
    public function handle()
    {
        try {
            $request = $this->app->make(RequestContract::class);
            $this->sendThoughMiddleware($request)
                ->then($this->dispatchToRouter());

            exit();
        } catch (Throwable $e) {
            $handle = $this->make(ExceptionHandleContract::class);
            $this->reportException($handle, $e);

            $this->renderException($handle, $e);
        }
    }

    /**
     * Send though middleware
     *
     * @param $request
     * @return Middleware
     */
    private function sendThoughMiddleware($request)
    {
        $pipeline = $this->getMiddleware();
        $pipeline->send($request);
        
        foreach ($this->middleware as $middleware) {
            $pipeline->addPipe($this->app->make($middleware));
        }

        return $pipeline;
    }

    private function getMiddleware()
    {
        return new Middleware();
    }

    private function dispatchToRouter()
    {
        $app = $this->app;
        return function ($request) use ($app) {
            $route = $app->make(RouterContract::class);
            $parameters = $this->getRouteParameters($route);

            (new Dispatcher())
                ->detect($parameters)
                ->dispatch($app);
        };
    }

    private function getRouteParameters(RouterContract $route)
    {
        return $route->getParameters();
    }

    private function reportException(ExceptionHandleContract $handle, Throwable $e)
    {
        $handle->report($e);
    }

    private function renderException(ExceptionHandleContract $handle, Throwable $e)
    {
        $handle->render($e);
    }
}
