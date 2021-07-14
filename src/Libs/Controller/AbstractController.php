<?php

namespace Nin\Libs\Controller;

use Nin\Libs\Container\ApplicationContract;
use Nin\Libs\Exceptions\NotFoundException;

abstract class AbstractController implements ControllerContract
{
    const CONTROLLER_BASE = '\Nin\Controllers\\';

    protected string $name;
    protected string $action;
    protected array $arguments;

    public function getControllerName(): string
    {
        return $this->name;
    }

    public function getActionName(): string
    {
        return $this->action;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function explode($parameters)
    {
        $controller = explode("::", $parameters['controller']);
        $name = self::CONTROLLER_BASE . $controller[0];
        $actionName = $controller[1];
    }

    public function detectController($parameters)
    {
        $routeArguments = explode("::", $parameters['controller']);

        try {
            $this->name = self::CONTROLLER_BASE . array_shift($controller);
            $this->action = array_shift($controller);
            $this->arguments = $routeArguments;
        } catch (\Exception $e) {
            throw new NotFoundException('Controller not found!');
        }
    }

    public function dispatch(ApplicationContract $app)
    {
        $name = $this->getControllerName();
        $actionName = $this->getActionName();
        $arguments = $this->getArguments();

        $controller = $app->make($name);
        echo $controller->$actionName(extract($arguments));
        exit();
    }

}
