<?php

declare(strict_types=1);

namespace Ydg\FoudationSdk\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Ydg\FoudationSdk\FoundationClient;

class HttpClientServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        ! isset($pimple['http_client']) && $pimple['http_client'] = function () {
            return new FoundationClient();
        };
    }
}
