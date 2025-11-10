<?php

namespace App\Services\Integrations;

interface IntegrationStrategy
{
    /**
     * Devuelve el nombre de la integración, por ejemplo "amazon" o "meli".
     */
    public function getName(): string;

    /**
     * Actualiza el stock de un producto.
     *
     * @param string $sku Identificador único del producto en tu sistema.
     * @param int $quantity Cantidad actualizada.
     * @return bool true si se actualizó correctamente, false si falló (por ejemplo, error remoto).
     * @throws \Throwable si ocurre un error crítico (por ejemplo, credenciales inválidas).
     */
    public function updateStock(string $sku, int $quantity): bool;

    /**
     * Obtiene las órdenes más recientes desde la integración externa.
     *
     * @param array $filters Filtros opcionales, como rango de fechas, estado, etc.
     * @return array Lista de órdenes normalizadas. Cada orden debería tener un formato común:
     * [
     *   'id' => string,
     *   'status' => string,
     *   'created_at' => string,
     *   'items' => [
     *       ['sku' => string, 'quantity' => int, 'price' => float],
     *   ],
     *   'customer' => ['name' => string, 'email' => string],
     * ]
     */
    public function getOrders(array $filters = []): array;
}
