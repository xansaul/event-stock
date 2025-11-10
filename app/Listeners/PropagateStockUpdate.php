<?php

namespace App\Listeners;

use App\Events\StockAdjusted;
use App\Jobs\UpdateStockOnIntegration;
use App\services\Integrations\IntegrationManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PropagateStockUpdate implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(protected IntegrationManager $manager)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StockAdjusted $event): void
    {
        \Log::info("[Listener] Propagando actualización de {$event->sku} ({$event->newStock}) desde {$event->source}");

        foreach ($this->manager->getAll() as $name => $integration) {

            if ($name === $event->source) {
                \Log::info("[Listener] Omitiendo {$name} (fuente original)");
                continue;
            }

            UpdateStockOnIntegration::dispatch($integration, $event->sku, $event->newStock);
        }
    }
}
