<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Database\Seeders;

use App\Modules\Invoices\Domain\Enums\CurrencyEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productNames = [
            'pen',
            'pencil',
            'razer',
            'gum',
            'towel',
            'backpack',
            'book',
            'shoes',
            'trousers',
            't-shirt',
            'snickers',
            'water',
            'coca-cola',
            'pepsi',
        ];

        $products = [];

        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'id' => Uuid::uuid4()->toString(),
                'name' => $productNames[array_rand($productNames)],
                'price' => rand(1111, 9999999),
                'currency' => 'usd',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
