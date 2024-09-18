<?php

namespace App\Http\Controllers;

use App\Factories\CatalogueFactory;
use App\Http\Controllers\Controller;
use App\Services\CatalogueService;
use Inertia\Inertia;
use GuzzleHttp\Exception\RequestException;
use InvalidArgumentException;

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

            // Map each content item to its respective model and get the model's array representation
            $content = array_map( function ($item) {
                try {
                    $contentObject = CatalogueFactory::create($item['contenttype'], $item);
                    return $contentObject->toArray();
                } catch (InvalidArgumentException $e) {
                    // If the content type is invalid, just return the item as is so application does not crash
                    return $item;
                }
            }, $contentItems);

            return Inertia::render('Home', [
                'content' => $content
            ]);
        } catch (RequestException $e) {
            return Inertia::render('Error', ['message' => 'Unable to fetch catalogue data.']);
        } catch (\Exception $e) {
            return Inertia::render('Error', ['message' => 'An error occurred while processing the data.']);
        }
    }
}
