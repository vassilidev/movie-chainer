<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $jobTitle = $this->faker->jobTitle;

        return [
            'label' => $jobTitle,
            'name' => $jobTitle,
            'created_at' => now(),
        ];
    }
}
