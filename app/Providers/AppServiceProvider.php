<?php

namespace App\Providers;

use App\services\Integrations\AmazonStrategy;
use App\services\Integrations\IntegrationManager;
use App\services\Integrations\MercadoLibreStrategy;
use App\services\Integrations\ShopifyStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IntegrationManager::class);

        // TODO: hacer esto dinamico -> que se pueda activar y desactivar
        $this->app->singleton(AmazonStrategy::class);
        $this->app->singleton(MercadoLibreStrategy::class);
        $this->app->singleton(ShopifyStrategy::class);

        $this->app->tag([
            AmazonStrategy::class,
            MercadoLibreStrategy::class,
            ShopifyStrategy::class,
        ], 'app.integration_strategies');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $manager = $this->app->make(IntegrationManager::class);

        $strategies = $this->app->tagged('app.integration_strategies');

        foreach ($strategies as $strategy) {
            $manager->register($strategy);
        }
    }
}
