<?php

namespace App\Modules\Invoices\Database\Factories;

use App\Modules\Invoices\Models\CompanyModel;
use App\Modules\Invoices\Models\InvoiceModel;
use Faker\Provider\ar_EG\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class InvoiceFactory extends Factory
{
    protected $model = InvoiceModel::class;

    public function definition(): array
    {
        $company = CompanyModel::factory()->create();
        dump($company->id);
        return [
            'id'         => Uuid::uuid4()->toString(),
            'number'     => $this->faker->uuid,
            'date'       => $this->faker->date,
            'due_date'   => $this->faker->date,
            // 'company_id' => $this->faker->randomElement(['535a938c-ef81-4e27-8485-7bc657c7170d, 2c9c609d-a52e-4860-a43b-534815391b75']),
            'company_id' => $company->id,
            'status'     => $this->faker->randomElement(['draft', 'approved', 'rejected']),
            'created_at' => $this->faker->date,
            'updated_at' => $this->faker->date,
        ];
    }
}
