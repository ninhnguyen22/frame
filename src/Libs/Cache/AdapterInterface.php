<?php

namespace Nin\Libs\Cache;

interface AdapterInterface
{
    public function get(string $key);

    public function set(string $key, $value, $expireAt = null);

    public function has(string $key): bool;
}
