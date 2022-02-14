<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Database\Factories;

use Inisiatif\ModelShared\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

final class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'is_active' => true,
        ];
    }
}
