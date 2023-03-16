<?php

declare(strict_types=1);

namespace Ydg\FoudationSdk;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Ydg\FoudationSdk\Traits\InteractWithHttpClient;

class FoundationClient
{
    use InteractWithHttpClient;

    /**
     * GET request.
     *
     * @throws GuzzleException
     */
    public function get(string $url, array $query = [], array $options = []): ResponseInterface
    {
        return $this->request('GET', $url, array_merge(['query' => $query], $options));
    }

    /**
     * @throws GuzzleException
     */
    public function request(string $method, string $url, array $options = []): ResponseInterface
    {
        $method = strtoupper($method);

        return $this->getHttpClient()->request($method, $url, $options);
    }

    /**
     * POST request.
     *
     * @throws GuzzleException
     */
    public function post(string $url, array $form = [], array $options = []): ResponseInterface
    {
        return $this->request('POST', $url, array_merge(['form_params' => $form], $options));
    }

    /**
     * JSON request.
     *
     * @throws GuzzleException
     */
    public function json(string $url, array $data = [], array $options = []): ResponseInterface
    {
        return $this->request('POST', $url, array_merge(['json' => $data], $options));
    }
}
