<?php

namespace Nin\Libs\ORM;

use Nin\Libs\Support\Config\AbstractConfig;

class ORMConfig extends AbstractConfig implements ORMConfigContract
{
    public function getEntitiesPath(): array
    {
        $entitiesPath = $this->config->get('orm.entities_dir', ['Entities']);
        foreach ($entitiesPath as $key => $entity) {
            $entitiesPath[$key] = ROOT . $entity;
        }
        return $entitiesPath;
    }

    public function getIsDevMode(): bool
    {
        return $this->config->get('orm.is_dev_mode', true);
    }

    public function getProxyDir()
    {
        return $this->config->get('orm.proxy_dir', null);
    }

    public function getCache()
    {
        return $this->config->get('orm.cache', null);
    }

    public function getUseSimpleAnnotationReader(): bool
    {
        return $this->config->get('orm.use_simple_annotation_reader', false);
    }
}
