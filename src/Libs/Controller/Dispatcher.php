<?php

namespace Nin\Libs\Controller;

use Nin\Libs\Container\ApplicationContract;
use Nin\Libs\Exceptions\NotFoundException;

class Dispatcher
{
    const CONTROLLER_BASE = '\Nin\Controllers\\';

    protected string $name;
    protected string $action;
    protected array $arguments;

    public function detect($parameters)
    {
        $controllerAgr = explode("::", $parameters['controller']);

        // Controller
        $name = self::CONTROLLER_BASE . $controllerAgr[0];
        if (!class_exists($name)) {
            throw new \ReflectionException("Controller: {$name} doesn't exist!");
        }
        $this->name = $name;

        $action = $controllerAgr[1];
        if (!method_exists($name, $action)) {
            throw new \ReflectionException("Action: {$action}  doesn't exist!");
        }
        $this->action = $action;

        array_shift($parameters);
        array_shift($parameters);
        $this->arguments = $parameters;

        return $this;
    }

    public function dispatch(ApplicationContract $app)
    {
        $name = $this->name;
        $actionName = $this->action;
        $arguments = $this->arguments;

        $controller = $app->make($name);

        $actionParameters = $this->_getActionParameters($name, $actionName);
        $dependency = $this->considerArgument($app, $actionParameters);
        if ($dependency !== false) {
            echo $controller->$actionName($dependency, extract($arguments));
        }
        echo $controller->$actionName(extract($arguments));
    }

    /**
     * Consider Argument
     *
     * @param ApplicationContract $app
     * @param $actionParameters
     * @return bool
     */
    public function considerArgument(ApplicationContract $app, $actionParameters)
    {
        if (empty($actionParameters)) {
            return false;
        }
        $instance = $actionParameters[0];
        $dependency = $instance->getClass();
        if (is_null($dependency)) {
            return false;
        }
        if ($app->has($dependency->name)) {
            return $app->make($dependency->name);
        } else {
            return false;
        }
    }

    private function _getActionParameters($name, $actionName)
    {
        $reflector = new \ReflectionClass($name);
        return $reflector
            ->getMethod($actionName)
            ->getParameters();
    }
}
