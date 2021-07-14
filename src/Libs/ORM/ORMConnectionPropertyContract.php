<?php

namespace Nin\Libs\ORM;

interface ORMConnectionPropertyContract
{
    public function getDriver(): string;

    public function getHost(): string;

    public function getDbName(): string;

    public function getUser(): string;

    public function getPassword(): string;
}
