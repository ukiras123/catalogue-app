<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use GuzzleHttp\Client;

class CatalogueController extends Controller
{

    public function index()
    {
        $client = new Client();
        $baseUrl = env('API_EXTERNAL_CATALOGUE_BASE_URL');
        $tenancyId = env('API_EXTERNAL_CATALOGUE_TENANT_ID');
        $apiKey = env('API_EXTERNAL_CATALOGUE_API_KEY');
        $perPage = env('API_EXTERNAL_CATALOGUE_PER_PAGE', 20);
        $catalogueAPIPath = 'local/acorn_coursemanagement/index.php/api/1.1/external_catalogue';
        $url = $baseUrl.'/'.$catalogueAPIPath.'/'.$tenancyId;
        $response = $client->request('GET', $url , [
            'query' => ['perPage' => $perPage],
            'headers' => [
                'Authorization' => "Bearer " . $apiKey,
            ]
        ]);
        return Inertia::render('Home', ['content' => $response->getBody()->getContents()]);
    }
}
