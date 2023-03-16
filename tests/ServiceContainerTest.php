<?php

declare(strict_types=1);

namespace YdgTest\FoudationSdk;

use PHPUnit\Framework\TestCase;
use Ydg\FoudationSdk\ServiceContainer;

/**
 * @internal
 * @coversNothing
 */
class ServiceContainerTest extends TestCase
{
    public function testSimple()
    {
        $app = new ServiceContainer();
        $this->assertIsObject($app);
    }

    public function testConfig()
    {
        $config = [
            'app_key' => 'xxx',
            'app_secret' => 'xxx-xxx',
        ];
        $app = new ServiceContainer($config);
        $this->assertEquals($app->getConfig(), $config);
    }
}
