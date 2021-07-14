<?php

namespace Nin\Libs\Cache;

class MemcachedFactory extends AdapterFactory
{
    private string $host;
    private string $port;

    public function __construct(string $host = "localhost", string $port = "11211")
    {
        $this->host = $host;
        $this->port = $port;
    }

    public function getInstance(): AdapterInterface
    {
        return new LibMemcached($this->host, $this->port);
    }
}
