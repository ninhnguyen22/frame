<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Container\ApplicationContract;

/**
 * Class Facade
 * @package Nin\Libs\Facades
 */
class Facade
{
    /**
     * Application manager
     *
     * @var ApplicationContract
     */
    protected static ApplicationContract $app;

    /**
     * Set Application manager
     *
     * @param ApplicationContract $app
     */
    public static function setFacadeApplication(ApplicationContract $app)
    {
        static::$app = $app;
    }

    /**
     * The resolved object instances.
     *
     * @var array
     */
    protected static array $resolvedInstance;

    /**
     * Resolve facade instance.
     *
     * @param $instance
     * @return mixed
     */
    protected static function resolveFacadeInstance($instance)
    {
        if (is_object($instance)) {
            return $instance;
        }

        /**
         * Get from facade resolved instance.
         */
        if (isset(static::$resolvedInstance[$instance])) {
            return static::$resolvedInstance[$instance];
        }

        /**
         * Get from application container
         */
        if (static::$app) {
            return static::$resolvedInstance[$instance] = static::$app->make($instance);
        }
    }

    /**
     * Get facade instance.
     *
     * @return mixed
     */
    public static function getFacadeInstance()
    {
        return static::resolveFacadeInstance(static::getFacadeAccessor());
    }

    /**
     * Call static method
     *
     * @param string $method
     * @param mixed $args
     * @return mixed
     * @throws \Exception
     */
    public static function __callStatic(string $method, $args)
    {
        $instance = static::getFacadeInstance();

        if (!$instance) {
            throw new \Exception('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }

}
