<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CatalogueService;
use Inertia\Inertia;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CatalogueController extends Controller
{
    private $catalogueService;

    public function __construct(CatalogueService $catalogueService)
    {
        $this->catalogueService = $catalogueService;
    }

    public function index()
    {
        try {
            $contentItems = $this->catalogueService->fetchContent();
            return Inertia::render('Home', [
                'content' => $contentItems
            ]);
        } catch (RequestException $e) {
            return Inertia::render('Error', ['message' => 'Unable to fetch catalogue data.']);
        } catch (\Exception $e) {
            return Inertia::render('Error', ['message' => 'An error occurred while processing the data.']);
        }
    }
}
