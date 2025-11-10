<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'sku' => 'PROD-001',
                'name' => 'Auriculares Bluetooth',
                'description' => 'Auriculares inalámbricos con cancelación de ruido',
                'price' => 899.99,
                'stock' => 25,
                'category' => 'Electrónica',
            ],
            [
                'sku' => 'PROD-002',
                'name' => 'Teclado Mecánico RGB',
                'description' => 'Teclado mecánico retroiluminado con switches azules',
                'price' => 1199.00,
                'stock' => 15,
                'category' => 'Periféricos',
            ],
            [
                'sku' => 'PROD-003',
                'name' => 'Mouse Gamer 7200 DPI',
                'description' => 'Mouse ergonómico con sensor óptico de alta precisión',
                'price' => 699.50,
                'stock' => 30,
                'category' => 'Periféricos',
            ],
            [
                'sku' => 'PROD-004',
                'name' => 'Monitor 27” 2K IPS',
                'description' => 'Monitor de 27 pulgadas con resolución QHD y 144Hz',
                'price' => 4999.90,
                'stock' => 10,
                'category' => 'Monitores',
            ],
            [
                'sku' => 'PROD-005',
                'name' => 'Laptop Ultrabook 14”',
                'description' => 'Laptop ligera con procesador Intel i7 y SSD de 512GB',
                'price' => 18999.00,
                'stock' => 5,
                'category' => 'Computadoras',
            ],
            [
                'sku' => 'PROD-006',
                'name' => 'Smartwatch Deportivo',
                'description' => 'Reloj inteligente con GPS y monitor de ritmo cardíaco',
                'price' => 1599.00,
                'stock' => 40,
                'category' => 'Wearables',
            ],
            [
                'sku' => 'PROD-007',
                'name' => 'Cámara de Seguridad Wi-Fi',
                'description' => 'Cámara HD con detección de movimiento y visión nocturna',
                'price' => 899.00,
                'stock' => 20,
                'category' => 'Seguridad',
            ],
            [
                'sku' => 'PROD-008',
                'name' => 'Disco SSD 1TB NVMe',
                'description' => 'Unidad de estado sólido de alto rendimiento PCIe 4.0',
                'price' => 2499.00,
                'stock' => 12,
                'category' => 'Almacenamiento',
            ],
            [
                'sku' => 'PROD-009',
                'name' => 'Silla Gamer Ergonómica',
                'description' => 'Silla con soporte lumbar, reclinable y base metálica',
                'price' => 3499.00,
                'stock' => 8,
                'category' => 'Muebles',
            ],
            [
                'sku' => 'PROD-010',
                'name' => 'Cargador Rápido USB-C 65W',
                'description' => 'Cargador compatible con PD3.0 y QC4.0 para laptops y móviles',
                'price' => 499.00,
                'stock' => 50,
                'category' => 'Accesorios',
            ],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }

    }
}
