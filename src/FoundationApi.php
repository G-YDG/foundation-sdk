<?php

declare(strict_types=1);

namespace Ydg\FoudationSdk;

abstract class FoundationApi
{
    /**
     * Http Client Instance.
     *
     * @var FoundationClient
     */
    protected $httpClient;

    public function getHttpClient(): FoundationClient
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new FoundationClient();
            $this->httpClient->setHttpClientDefaultOptions($this->getHttpClientDefaultOptions());
        }

        return $this->httpClient;
    }

    public function setHttpClient(FoundationClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function getHttpClientDefaultOptions(): array
    {
        return [];
    }
}
