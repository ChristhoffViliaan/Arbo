<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Moulding',
                'description' => 'Carefully finished profiles for furniture, interiors, and construction.',
                'image' => 'products/Moulding.png',
            ],
            [
                'id' => 2,
                'name' => 'Hammer Mill',
                'description' => 'Reliable processing equipment for consistent wood-fiber output.',
                'image' => 'products/Hammer Mill.png',
            ],
            [
                'id' => 3,
                'name' => 'Sawmill',
                'description' => 'Quality timber products, prepared with care from log to finish.',
                'image' => 'products/Sawmil.png',
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['id' => $product['id']],
                $product
            );
        }
    }
}
