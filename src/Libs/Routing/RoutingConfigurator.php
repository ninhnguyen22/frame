<?php

namespace Nin\Libs\Routing;

use Nin\Libs\Request\RequestInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class RoutingConfigurator implements RouteConfigInterface
{
    protected string $resource;

    protected RequestInterface $request;

    public function getFileLoader(): FileLoader
    {
        return new YamlFileLoader(new FileLocator(array(__DIR__ . '/../../Config')));
    }

    public function import(string $routeFile): RouteConfigInterface
    {
        $this->resource = $routeFile;

        return $this;
    }

    public function configRequest(RequestInterface $request)
    {
        $request->fromRequest(Request::createFromGlobals());
        $this->request = $request;
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function getRoute(): RoutingInterface
    {
        try {
            $fileLoader = $this->getFileLoader();
            return new Router($fileLoader, $this->resource, [], $this->request);
        } catch (ResourceNotFoundException $e) {
            echo $e->getMessage();
            var_dump($e->getMessage());
            exit();
        }
    }

}
