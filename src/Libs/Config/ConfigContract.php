<?php

namespace Nin\Libs\Config;

/**
 * Interface Config Contract
 * @package Nin\Libs\Config
 */
interface ConfigContract
{
    /**
     * Determine if the given configuration value exists.
     *
     * @param string $key
     * @return bool
     */
    public function has($key): bool;

    /**
     * Get the specified configuration value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Set a given configuration value.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, $value = null): void;
}
