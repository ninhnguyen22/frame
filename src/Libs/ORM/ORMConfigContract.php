<?php

namespace Nin\Libs\ORM;


interface ORMConfigContract
{
    public function getEntitiesPath(): array;

    public function getIsDevMode(): bool;

    public function getProxyDir();

    public function getCache();

    public function getUseSimpleAnnotationReader(): bool;
}
