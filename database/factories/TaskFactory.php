<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->text(),
            'description' => $this->faker->text(),
            'admin_id' => \App\Models\Admin::all()->random()->id,
            'assigne_id' => \App\Models\Assigne::all()->random()->id,

        ];
    }


}
