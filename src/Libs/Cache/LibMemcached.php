<?php

namespace Nin\Libs\Cache;

class LibMemcached implements AdapterInterface
{
    private \Memcached $memcache;

    public function __construct(string $host, string $port)
    {
        $this->memcache = $this->getMemcache();
        $this->memcache->addServer($host, $port);
    }

    protected function getMemcache(): \Memcached
    {
        return new \Memcached();
    }

    public function get(string $key)
    {
        return $this->memcache->get($key);
    }

    public function set(string $key, $value, $expireAt = null)
    {
        return $this->memcache->set($key, $value, $expireAt);
    }

    public function has(string $key): bool
    {
        return $this->memcache->get($key);
    }

}
