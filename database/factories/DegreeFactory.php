<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Database\Factories;

use Inisiatif\ModelShared\Models\Degree;
use Illuminate\Database\Eloquent\Factories\Factory;

final class DegreeFactory extends Factory
{
    protected $model = Degree::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'is_active' => true,
        ];
    }
}
