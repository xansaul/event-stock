<?php

namespace App\services;

use App\Events\StockAdjusted;
use App\Models\Product;
use App\services\Integrations\IntegrationManager;
use Illuminate\Support\Facades\Log;

class IntegrationService
{
    public function __construct(
        protected IntegrationManager $integrationManager
    ){}

    public function adjustStock(string $source, string $sku, int $change): void
    {
        $product = Product::where('sku', $sku)->first();

        $newStock = max($product->stock + $change, 0);
        $product->update(['stock' => $newStock]);

        Log::info("[Core] {$sku} actualizado a {$newStock} (por {$source})");


        event(new StockAdjusted($sku, $newStock, $source));
    }
}
