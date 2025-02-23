<?php

namespace App\Modules\Invoices\Database\Factories;

use App\Modules\Invoices\Models\CompanyModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class CompanyFactory extends Factory
{
    protected $model = CompanyModel::class;

    public function definition(): array
    {
        return [
            'id'    => Uuid::uuid4()->toString(),
            'name'  => $this->faker->company,
            'street' => $this->faker->company,
            'city' => $this->faker->company,
            'zip' => $this->faker->company,
            'phone' => $this->faker->company,
            'email' => $this->faker->company,
            'created_at' => $this->faker->date,
            'updated_at' => $this->faker->date,
        ];
    }
}
