<?php

declare(strict_types=1);

namespace Ydg\FoudationSdk;

use Pimple\Container;
use Ydg\FoudationSdk\Providers\ConfigServiceProvider;

class ServiceContainer extends Container
{
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var array
     */
    protected $providers = [];

    /**
     * ServiceContainer constructor.
     */
    public function __construct(array $config = [])
    {
        parent::__construct();

        $this->setConfig($config);
        $this->registerProviders($this->getProviders());
    }

    /**
     * Magic get access.
     *
     * @return mixed
     */
    public function __get(string $id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param mixed $value
     */
    public function __set(string $id, $value)
    {
        $this->offsetSet($id, $value);
    }

    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }

    public function getProviders(): array
    {
        return array_merge([ConfigServiceProvider::class], $this->providers);
    }

    public function getConfig($key = null)
    {
        return $key ? ($this->config[$key] ?? null) : $this->config;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }
}
