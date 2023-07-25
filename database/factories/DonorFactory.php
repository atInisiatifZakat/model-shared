<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Database\Factories;

use Inisiatif\ModelShared\Models\Donor;
use Illuminate\Database\Eloquent\Factories\Factory;

final class DonorFactory extends Factory
{
    protected $model = Donor::class;

    public function definition(): array
    {
        return [
            'branch_id' => $this->faker->uuid(),
            'employee_id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'identification_number' => $this->faker->uuid(),
        ];
    }
}
