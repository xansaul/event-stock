<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\services\Integrations\MercadoLibreStrategy;
use App\services\Integrations\ShopifyStrategy;
use App\services\Integrations\AmazonStrategy;
use App\services\Integrations\IntegrationManager;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('products', ProductController::class);

