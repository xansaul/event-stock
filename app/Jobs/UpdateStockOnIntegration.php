<?php

namespace App\Jobs;

use App\services\Integrations\IntegrationManager;
use App\Services\Integrations\IntegrationStrategy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdateStockOnIntegration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected IntegrationStrategy $integration;
    protected string $sku;
    protected int $quantity;

    /**
     * Create a new job instance.
     */
    public function __construct(IntegrationStrategy $integration, string $sku, int $quantity)
    {
        $this->integration = $integration;
        $this->sku = $sku;
        $this->quantity = $quantity;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $success = $this->integration->updateStock($this->sku, $this->quantity);

        if ($success) {
            Log::info("[Job] Stock sincronizado en {$this->integration->getName()}: {$this->sku} = {$this->quantity}");
        } else {
            Log::error("[Job] Falló sincronización en {$this->integration->getName()} para {$this->sku}");
        }
    }
}
