<?php

namespace Nin\Libs\Auth;

interface AuthManagerFactory
{
    public function user(): Factory;

    public function check(): bool;
}
