<?php

namespace App\services\Integrations;

use App\services\Integrations\IntegrationStrategy;

class AmazonStrategy implements IntegrationStrategy
{

    public function getName(): string
    {
        return 'amazon';
    }

    public function updateStock(string $sku, int $quantity): bool
    {
        \Log::info("Actualizando stock Amazon: $sku cantidad: $quantity");
        return true;
    }

    public function getOrders(array $filters = []): array
    {
        return [];
    }
}
