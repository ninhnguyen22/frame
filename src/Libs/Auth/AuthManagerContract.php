<?php

namespace Nin\Libs\Auth;

interface AuthManagerContract
{
    public function user(): Factory;

    public function check(): bool;
}
