<?php

namespace Nin\Libs\Session;

interface SessionContract
{
    public function all(): array;

    public function get(string $key, $default = null);

    public function set(string $key, $value): void;

    public function has(string $key): bool;

    public function forget(string $key): void;
}
