<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
            CompanySeeder::class,
            InvoiceSeeder::class,
        ]);
    }
}
