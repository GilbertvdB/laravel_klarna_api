<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

/**
 * KlarnaBaseService class provides common functionality for interacting with Klarna's API.
 */
class KlarnaBaseService
{
    /**
     * @var string $baseUrl The base URL for the Klarna API.
     */
    protected string $baseUrl;

    /**
     * @var string $username The Klarna API username.
     */
    protected string $username;

    /**
     * @var string $password The Klarna API password.
     */
    protected string $password;

    /**
     * KlarnaBaseService constructor.
     * Initializes the service with the Klarna API credentials.
     */
    public function __construct()
    {
        $this->baseUrl = config('klarna.api_base_url');
        $this->username = config('klarna.username');
        $this->password = config('klarna.password');
    }

    /**
     * Makes an HTTP request to Klarna API using basic authentication.
     *
     * @param string $method The HTTP method (e.g., 'get', 'post', 'delete').
     * @param string $url The URL path of the API endpoint.
     * @param array $data The request payload (optional).
     * @return \Illuminate\Http\Client\Response The response from the Klarna API.
     */
    protected function makeRequest(string $method, string $url, array $data = []): Response
    {   
        return Http::withBasicAuth($this->username, $this->password)
                    ->{$method}($this->baseUrl . $url, $data);
    }
}
