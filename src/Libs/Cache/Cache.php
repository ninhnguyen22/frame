<?php

namespace Nin\Libs\Cache;

class Cache implements AdapterInterface
{
    private AdapterInterface $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAdapter()
    {
        return $this->adapter;
    }

    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
    }

    public function get(string $key)
    {
        return $this->adapter->get($key);
    }

    public function set(string $key, $value, $expireAt = null)
    {
        return $this->adapter->set($key, $value, $expireAt);
    }

    public function has(string $key): bool
    {
        return $this->adapter->has($key);
    }
}
