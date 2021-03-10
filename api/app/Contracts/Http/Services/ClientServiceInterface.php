<?php

namespace App\Contracts\Http\Services;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ClientServiceInterface
{
    public function request(string $method, string $resource, array $configs = []): ResponseInterface;
}
