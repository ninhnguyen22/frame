<?php

namespace Nin\Libs\Auth;

class AuthManager implements AuthManagerContract
{
    public function user(): Factory
    {
        // todo
        return new Auth(1, 'Admin');
    }

    public function check(): bool
    {
        return false;
    }
}
