<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CatalogueService
{
    private $client;

    public function __construct()
    {
        $apiKey = config('services.acorn_api.api_key');
        $this->client = new Client([
            'base_uri' => config('services.acorn_api.base_url'),
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function fetchContent()
    {
        try {
            $tenancyId = config('services.acorn_api.tenancy_id');
            $catalogueApiPath = config('services.acorn_api.external_catalogue_api_path');
            $perPage = config('services.acorn_api.per_page');

            $response = $this->client->request('GET', $catalogueApiPath . "$tenancyId", [
                'query' => ['perPage' => $perPage]
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            // Check for JSON errors
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Failed to decode JSON: ' . json_last_error_msg());
            }
            // Check for API format errors
            if (!isset($data['data']['items'])) {
                throw new \Exception('Unexpected API response format.');
            }

            return $data['data']['items'];
        } catch (RequestException $e) {
            throw new \Exception('API request failed: ' . $e->getMessage());
        }
    }
}
