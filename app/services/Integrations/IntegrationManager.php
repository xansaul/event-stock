<?php

namespace App\Services\Integrations;

use Illuminate\Support\Collection;

class IntegrationManager
{
    /** @var Collection<string, IntegrationStrategy> */
    protected Collection $strategies;

    public function __construct()
    {
        $this->strategies = collect();
    }

    public function register(IntegrationStrategy $strategy): void
    {
        $name = strtolower($strategy->getName());
        $this->strategies->put($name, $strategy);

    }

    public function unregister(string $strategyName): void
    {
        $name = strtolower($strategyName);
        $this->strategies->forget($name);

    }

    public function getByName(string $strategyName): ?IntegrationStrategy
    {
        $name = strtolower($strategyName);
        return $this->strategies->get($name);
    }

    public function getAll(): Collection
    {
        return $this->strategies;
    }
}
