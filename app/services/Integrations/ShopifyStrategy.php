<?php

namespace App\services\Integrations;

use App\Services\Integrations\IntegrationStrategy;

class ShopifyStrategy implements IntegrationStrategy
{

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'shopify';
    }

    /**
     * @inheritDoc
     */
    public function updateStock(string $sku, int $quantity): bool
    {
        \Log::info("Actualizando stock Shopify: $sku cantidad: $quantity");

        return true;
    }

    /**
     * @inheritDoc
     */
    public function getOrders(array $filters = []): array
    {
        return [];
    }
}
