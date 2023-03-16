<?php

declare(strict_types=1);

namespace Ydg\FoudationSdk\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Ydg\FoudationSdk\Config;

class ConfigServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        ! isset($pimple['config']) && $pimple['config'] = function ($app) {
            return new Config($app->getConfig());
        };
    }
}
