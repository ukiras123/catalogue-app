<?php

use App\Http\Controllers\CatalogueController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogueController::class, 'index']);
