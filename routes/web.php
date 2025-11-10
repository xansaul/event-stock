<?php

use Illuminate\Support\Facades\Route;
use App\services\IntegrationService;

Route::get('/simulate-sale', function (IntegrationService $inventory) {

    $inventory->adjustStock('amazon', 'PROD-001', -1);

    return 'Venta simulada';
});
