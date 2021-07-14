<?php

namespace Nin\Libs\Support;

/**
 * Class Singleton
 * @package Nin\Libs
 */
class Singleton
{
    /**
     * Instances singleton
     * @var array
     */
    private static $instances = [];

    /**
     * Prevent direct construction calls with the `new` operator.
     */
    protected function __construct()
    {
    }

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone()
    {
    }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}
