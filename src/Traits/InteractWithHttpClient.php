<?php

declare(strict_types=1);

namespace Ydg\FoudationSdk\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

trait InteractWithHttpClient
{
    protected $httpClient;

    protected $defaultOptions = [];

    public function getHttpClient(): ClientInterface
    {
        if (! $this->httpClient instanceof ClientInterface) {
            $this->httpClient = $this->createHttpClient();
        }
        return $this->httpClient;
    }

    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function createHttpClient(): ClientInterface
    {
        return new Client($this->getHttpClientDefaultOptions());
    }

    protected function getHttpClientDefaultOptions(): array
    {
        return $this->defaultOptions;
    }

    protected function setHttpClientDefaultOptions(array $defaultOptions)
    {
        $this->defaultOptions = $defaultOptions;
    }
}
