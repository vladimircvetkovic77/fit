<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_uuid' => $this->faker->unique()->regexify('[A-Za-z0-9]{20}'),
        ];
    }
}
