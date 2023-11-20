<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->sentence(3),
            'description'   => $this->faker->text(),
            'completed'     => false,
            'created_at'    => new DateTime(),
            'updated_at'    => null,
        ];
    }
}
