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

    public function setHttpClient(FoundationClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getHttpClient(): FoundationClient
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new FoundationClient();
        }

        return $this->httpClient;
    }
}
