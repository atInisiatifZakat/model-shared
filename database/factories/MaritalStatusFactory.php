<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Database\Factories;

use Inisiatif\ModelShared\Models\MaritalStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

final class MaritalStatusFactory extends Factory
{
    protected $model = MaritalStatus::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'is_active' => true,
        ];
    }
}
