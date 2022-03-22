<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GymFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'gym_uuid' => $this->faker->unique()->regexify('[A-Za-z0-9]{20}'),
        ];
    }
}
