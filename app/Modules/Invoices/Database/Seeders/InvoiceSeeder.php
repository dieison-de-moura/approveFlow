<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Database\Seeders;

use App\Domain\Enums\InvoiceStatusEnum;
use Faker\Factory;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Uuid;

class InvoiceSeeder extends Seeder
{
    public function __construct(
        private ConnectionInterface $db
    ) {
    }

    public function run(): void
    {
        $companies = $this->db->table('companies')->get();
        $products = $this->db->table('products')->get();

        $faker = Factory::create();

        $invoices = [];

        for ($i = 0; $i < 10; $i++) {
            $invoices[] = [
                'id' => Uuid::uuid4()->toString(),
                'number' => $faker->uuid(),
                'date' => $faker->date(),
                'due_date' => $faker->date(),
                'company_id' => $companies->random()->id,
                'status' => InvoiceStatusEnum::cases()[array_rand(InvoiceStatusEnum::cases())],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $this->db->table('invoices')->insert($invoices);
        $this->addInvoiceProductLines($products, $invoices);
    }

    private function addInvoiceProductLines(Collection $products, array $invoices): void
    {

        $lines = [];

        foreach ($invoices ?? [] as $invoice) {
            $randomNumberOfProducts = rand(1, 5);
            $freshProducts = clone $products;

            for ($i = 0; $i < $randomNumberOfProducts; $i++) {
                $lines[] = [
                    'id' => Uuid::uuid4()->toString(),
                    'invoice_id' => $invoice['id'],
                    'product_id' => $freshProducts->pop()->id,
                    'quantity' => rand(1, 100),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        $this->db->table('invoice_products')->insert($lines);
    }
}
