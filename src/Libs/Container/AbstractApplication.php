<?php

namespace Nin\Libs\Container;

use Nin\Libs\Config\ConfigContract as ConfigContract;
use Nin\Libs\Facades\RegisterFacade;
use Nin\Libs\Request\RequestContract;

/**
 * Class AbstractApplication
 * @package Nin\Libs\Container
 */
abstract class AbstractApplication implements ApplicationContract
{
    use Handle;
    use BootDependency;

    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;

    /**
     * @var ConfigContract
     */
    protected ConfigContract $config;

    /**
     * Declare dependencies.
     * @var array
     */
    protected array $dependencies = [
    ];

    /**
     * AbstractApplication constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Binding dependency
     *
     * @param $instance
     * @param null $concrete
     */
    public function bind($instance, $concrete = null)
    {
        $this->container->bind($instance, $concrete);
    }

    /**
     * Binding singleton dependency
     *
     * @param $instance
     * @param null $singleton
     */
    public function singleton($instance, $singleton = null)
    {
        $this->container->bind($instance, function () use ($singleton) {
            return $singleton;
        });
    }

    /**
     * Resolve dependency
     *
     * @param $instance
     * @return mixed
     */
    public function make($instance)
    {
        return $this->container->make($instance);
    }

    /**
     * Check dependency
     *
     * @param $instance
     * @return bool
     */
    public function has($instance): bool
    {
        return $this->container->has($instance);
    }

    /**
     * Boot method
     *
     * @throws \ReflectionException
     */
    public function boot()
    {
        $this->loadConfigure();

        $this->loadServiceProvider($this->config);

        /**
         * Register DI injection.
         */
        $this->registerDependencies();

        /**
         * Load Config
         */
        $this->make(ConfigContract::class)->loadConfig();

        /**
         * Register Facade
         */
        (new RegisterFacade())->bootstrap($this);
    }

    /**
     * Service Provider loader,
     *
     * @param ConfigContract $config
     */
    protected function loadServiceProvider(ConfigContract $config)
    {
        $servicesProvider = $config->get('services');
        foreach ($servicesProvider as $service) {
            $provider = new $service($this);
            $provider->register();

            if (property_exists($provider, 'bindings')) {
                foreach ($provider->bindings as $key => $value) {
                    $this->bind($key, $value);
                }
            }

            if (property_exists($provider, 'singletons')) {
                foreach ($provider->singletons as $key => $value) {
                    $this->singleton($key, $value);
                }
            }
        }
    }

    protected function loadConfigure()
    {
        $this->config = $this->make(ConfigContract::class);
        $this->config->loadConfig();
    }

    /**
     * Get router config
     *
     * @return RouteConfigInterface
     */
    public function getRouterConfig(): RouteConfigInterface
    {
        return $this->routerConfig;
    }

    /**
     * Get app config
     *
     * @return ConfigContract
     */
    public function getConfig()
    {
        return $this->config;
    }
}
