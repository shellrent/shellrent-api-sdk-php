<?php


namespace Shellrent\Api;


use GuzzleHttp\Client;

class ShellrentAPI
{
    const BASE_URL = 'https://manager.shellrent.com/api2';

    public function __construct(
        protected string $username,
        protected string $token
    ) {
    }

    public function purchases(): array
    {
        return $this->request('GET', '/purchase');
    }

    public function services(): array
    {
        return $this->request('GET', '/service');
    }

    public function request(string $method, string $url, array $option = []): array
    {
        $headers = [
            'Authorization' => $this->username . '.' . $this->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        $client = new Client();

        $jsonString = (string) $client->request($method,  self::BASE_URL . $url, array_merge_recursive([
            'headers' => $headers,
        ], $option))->getBody();

        $json = json_decode($jsonString, true);
        if (!$json) {
            throw new \Exception("Cannot decode json: " . $jsonString);
        }

        $errorCode = (int) $json['error'] ?? 500;
        if ($errorCode !== 0) {
            throw new \Exception($json['message'] ?? '', $errorCode);
        }

        return $json['data'] ?? [];
    }
}
