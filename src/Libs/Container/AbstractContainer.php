<?php

namespace Nin\Libs\Container;

use Exception;
use Closure;
use ReflectionClass;

/**
 * Class AbstractContainer
 * @package Nin\Libs\Container
 */
abstract class AbstractContainer implements ContainerInterface
{
    /**
     * @var array
     */
    protected array $instances = [];

    /**
     * Register a class|interface for the container.
     * [refer: singleton design pattern]
     *
     * @param \StdClass|mixed $abstract
     * @param null $concrete
     */
    public function bind($abstract, $concrete = null): void
    {
        if ($concrete === null) {
            $concrete = $abstract;
        }
        $this->instances[$abstract] = $concrete;
    }

    /**
     * Get instance from container.
     *
     * @param \StdClass|mixed $abstract
     * @param array $parameters
     *
     * @return mixed|null|object
     * @throws Exception
     */
    public function make($abstract, array $parameters = [])
    {
        // if container doesn't have it, just register it
        if (!$this->has($abstract)) {
            $this->bind($abstract);
        }

        return $this->resolve($this->instances[$abstract], $parameters);
    }

    /**
     * Check exist instance
     *
     * @param $abstract
     * @return bool
     */
    public function has($abstract): bool
    {
        return isset($this->instances[$abstract]);
    }

    /**
     * Resolve single
     *
     * @param $concrete
     * @param array $parameters
     *
     * @return mixed|object
     * @throws Exception
     */
    public function resolve($concrete, array $parameters)
    {
        if ($concrete instanceof Closure) {
            return $concrete($this, $parameters);
        }

        $reflector = new ReflectionClass($concrete);

        // check if class is instantiable
        if (!$reflector->isInstantiable()) {
            throw new Exception("Class {$concrete} is not instantiable");
        }

        // get class constructor
        $constructor = $reflector->getConstructor();
        if (is_null($constructor)) {
            // get new instance from class
            return $reflector->newInstance();
        }

        // get constructor params
        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters);

        // get new instance with dependencies resolved
        return $reflector->newInstanceArgs($dependencies);
    }

    /**
     * get all dependencies resolved
     *
     * @param \ReflectionParameter[] $parameters
     *
     * @return array
     * @throws Exception
     */
    public function getDependencies(array $parameters)
    {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            // get the type hinted class
            $dependency = $parameter->getClass();
            if ($dependency === null) {
                // check if default value for a parameter is available
                if ($parameter->isDefaultValueAvailable()) {
                    // get default value of parameter
                    $dependencies[] = $parameter->getDefaultValue();
                } else {
                    throw new Exception("Can not resolve class dependency {$parameter->name}");
                }
            } else {
                // get dependency resolved
                $dependencies[] = $this->make($dependency->name);
            }
        }

        return $dependencies;
    }
}
