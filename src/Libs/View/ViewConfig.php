<?php

namespace Nin\Libs\View;

use Nin\Libs\Support\Config\AbstractConfig;

class ViewConfig extends AbstractConfig implements ViewConfigContract
{
    public function getDirLoader(): string
    {
        return ROOT . $this->config->get('view.dir_loader', 'src/templates');
    }

    public function getCachePath(): string
    {
        return ROOT . $this->config->get('view.cache', 'cache');
    }
}
