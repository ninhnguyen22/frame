<?php

namespace Nin\Libs\Config;

use Nin\Libs\Support\Singleton;
use Symfony\Component\Yaml\Yaml;

class Config extends Singleton implements ConfigContract
{
    /**
     * Config value
     * @var array
     */
    private $hashmap = [];

    /**
     * Determine if the given configuration value exists.
     *
     * @param string $key
     * @return bool
     */
    public function has($key): bool
    {
        return !is_null($this->getNested($key));
    }

    /**
     * Get the specified configuration value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        $output = $this->getNested($key);
        return !is_null($output) ? $output : $default;
    }

    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all(): array
    {
        return $this->hashmap;
    }

    /**
     * Set a given configuration value.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, $value = null): void
    {
        $this->hashmap[$key] = $value;
    }

    /**
     * Get the specified configuration value by nested path.
     *
     * @param string $path
     * @param string $separator
     * @return array|mixed|null
     */
    public function getNested(string $path, $separator = '.')
    {
        $keys = explode($separator, $path);
        $output = $this->hashmap;

        foreach ($keys as $key) {
            if (isset($output[$key])) {
                $output = $output[$key];
            } else {
                return null;
            }
        }
        return $output;
    }

    /**
     * Config loader
     */
    public function loadConfig()
    {
        $configYml = Yaml::parseFile(ROOT . '/config/app.yaml');
        foreach ($configYml as $configKey => $configItem) {
            $this->set($configKey, $configItem);
        }
    }
}
