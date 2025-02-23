<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        $companies = [];

        for ($i = 0; $i < 10; $i++) {
            $companies[] = [
                'id' => Uuid::uuid4()->toString(),
                'name' => $faker->company(),
                'street' => $faker->streetAddress(),
                'city' => $faker->city(),
                'zip' => $faker->postcode(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->safeEmail(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('companies')->insert($companies);
    }
}
